<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use App\Models\Transacao;
use App\Models\Rifa;
use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;

class PagamentoController extends Controller
{
    public function processarPagamento(Request $request)
    {
        try {
            // Lógica para processar o pagamento e salvar os detalhes na tabela 'transacoes'
            $quantidadeCotas = $request->input('quantidade');
            $nomeCompleto = $request->input('nomeCompleto');
            $email = $request->input('email');
            $telefone = $request->input('numeroCelular');

            // Obtenha o rifa_id da sessão ou qualquer outra lógica que você estiver usando
            $rifaId = session('rifa_id');

            // Verifique se $rifaId está definido antes de tentar criar a transação
            if (!$rifaId) {
                return response()->json(['error' => 'Erro ao processar pagamento: Rifa não encontrada.'], 500);
            }

            // Salvar na tabela 'transacoes'
            Transacao::create([
                'rifa_id' => $rifaId,
                'quantidade_cotas' => $quantidadeCotas,
                'nome_completo' => $nomeCompleto,
                'email' => $email,
                'telefone' => $telefone,
            ]);

            // Restante do código...

            // Configuração das credenciais do Mercado Pago
            MercadoPagoConfig::setAccessToken('APP_USR-8971080664264371-120812-1a3b007d5060f902864b96f3e8cb75e8-311983816');

            // ... (restante do código para criação da preferência e link do QR Code)
            $qrCodeUrl = '...';
            return response()->json(['qrCodeUrl' => $qrCodeUrl]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Erro ao processar pagamento: ' . $e->getMessage()], 500);
        }
    }
}
