<?php
namespace App\Filament\Pages\Tenancy;

use App\Models\Cliente;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant; 


class RegisterTeam extends RegisterTenant
{
    public static function getLabel() : string 
    {
        return "Registrar cliente";
    }

    public function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name'),
        ]);
    }

    protected function handleRegistration(array $data): Cliente
    {
        $cliente = Cliente::create($data);

        $cliente->members()->attach(auth()->user());

        return $cliente;
    }
}