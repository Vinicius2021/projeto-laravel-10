<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;

    public function formatacaoMascaraDinheiroDecimal($valorParaFormar)
    {
        $tamanho = strlen($valorParaFormar);
        $dados = str_replace(',', '.', $valorParaFormar);
        if ($tamanho <= 6) {
            $dados = str_replace(',' , '.', $valorParaFormar);
        } else {
            if ($tamanho >= 8 && $tamanho <= 10) {
                $retiraVirgulaPorPonto = str_replace(',', '.', $valorParaFormar);
                $separaPorIndice = explode('.', $retiraVirgulaPorPonto);
                $dados = $separaPorIndice[0] . $separaPorIndice[1];
            }
        }
        return $dados;
    }
}
