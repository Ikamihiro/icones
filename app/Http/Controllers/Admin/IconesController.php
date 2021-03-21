<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Icone\StoreIconeRequest;
use App\Http\Requests\Icone\UpdateIconeRequest;
use App\Models\Icone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IconesController extends Controller
{
    /**
     * Lista todos os registros de Ícones
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icones = Icone::orderBy('updated_at')->paginate(5);
        return view('admin.icones.index', compact('icones'));
    }

    /**
     * Mostra formulário para inserção de um Ícone
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.icones.create');
    }

    /**
     * Salva um registro de Ícone no banco
     *
     * @param  StoreIconeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreIconeRequest $request)
    {
        DB::beginTransaction();

        try {
            $foto_path = $request->file('foto_path')->hashName();
            Icone::create(array_merge($request->validated(), [
                'foto_path' => $foto_path,
            ]));
            $request->file('foto_path')->store('fotos/');
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->route('icones.index')->with('success', 'Ícone inserido com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Icone  $icone
     * @return \Illuminate\Http\Response
     */
    public function show(Icone $icone)
    {
        return view('admin.icones.show', compact('icone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Icone $icone
     * @return \Illuminate\Http\Response
     */
    public function edit(Icone $icone)
    {
        return view('admin.icones.edit', compact('icone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Icone $icone
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIconeRequest $request, Icone $icone)
    {
        DB::beginTransaction();

        try {
            $data = [];

            if($request->hasFile('foto_path')) {
                $data['foto_path'] = $request->file('foto_path')->hashName();
                Storage::delete('fotos/' . $icone->foto_path);
                $request->file('foto_path')->store('fotos/');
            }

            $icone->update(array_merge($request->validated(), $data));

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->route('icones.index')->with('success', 'Ícone atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Icone  $icone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Icone $icone)
    {
        DB::beginTransaction();

        try {
            $icone->delete();

            if($icone->foto_path)
                Storage::delete('fotos/' . $icone->foto_path);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return redirect()->route('icones.index')->with('success', 'Ícone excluído com sucesso!');
    }
}
