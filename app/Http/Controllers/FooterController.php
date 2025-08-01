<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Footer;

class FooterController extends Controller
{
    public function show($id = null)
    {
        // Sempre busca o primeiro registro existente
        $footer = Footer::first();

        if (!$footer) {
            // Se não existir, mostra a view de criação
            return view("footer.create");
        } else {
            // Se existir, mostra a view de edição
            return view("footer.edit", ["data" => $footer]);
        }
    }

    public function DadosCreate(Request $request)
    {
        $request->validate([
            'transparency_portal_title' => 'required|string|max:255',
            'transparency_portal_description' => 'required|string',
            'contact_address' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'useful_links' => 'nullable|array',
            'useful_links.*.text' => 'required_with:useful_links|string|max:255',
            'useful_links.*.url' => 'required_with:useful_links|url|max:255',
            'copyright_text' => 'required|string|max:255',
        ]);

        // Busca o primeiro registro existente ou cria um novo
        $footer = Footer::first();
        if (!$footer) {
            $footer = new Footer();
        }

        $footer->transparency_portal_title = $request->input('transparency_portal_title');
        $footer->transparency_portal_description = $request->input('transparency_portal_description');
        $footer->contact_address = $request->input('contact_address');
        $footer->contact_email = $request->input('contact_email');
        $footer->contact_phone = $request->input('contact_phone');
        $footer->useful_links = $request->input('useful_links');
        $footer->copyright_text = $request->input('copyright_text');

        $footer->save();

        return redirect()->route('footer.editar', ['id' => $footer->id])
                         ->with('success', 'Dados do rodapé salvos e atualizados com sucesso!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transparency_portal_title' => 'required|string|max:255',
            'transparency_portal_description' => 'required|string',
            'contact_address' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|string|max:20',
            'useful_links' => 'nullable|array',
            'useful_links.*.text' => 'required_with:useful_links|string|max:255',
            'useful_links.*.url' => 'required_with:useful_links|url|max:255',
            'copyright_text' => 'required|string|max:255',
        ]);

        // Sempre pega o primeiro registro (único)
        $footer = Footer::firstOrFail();

        $footer->transparency_portal_title = $request->input('transparency_portal_title');
        $footer->transparency_portal_description = $request->input('transparency_portal_description');
        $footer->contact_address = $request->input('contact_address');
        $footer->contact_email = $request->input('contact_email');
        $footer->contact_phone = $request->input('contact_phone');
        $footer->useful_links = $request->input('useful_links');
        $footer->copyright_text = $request->input('copyright_text');

        if ($request->has('legal_links')) {
            $footer->legal_links = $request->input('legal_links');
        }

        $footer->save();

        return redirect()->route('footer.editar', ['id' => $footer->id])
                         ->with('success', 'Dados do rodapé atualizados com sucesso!');
    }
}
