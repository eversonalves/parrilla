<?php

namespace tests;

use App\Produto;
use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
    public function testBuscarPorTipoIdRetornaArray(): void
    {
        $produto = new Produto();
        $resultado = $produto->buscarPorTipoId(tipoId: 1);
        $this->assertIsArray(actual: $resultado);
    }

    public function testBuscarPorStringRetornaArray(): void
    {
        $produto = new Produto();
        $resultado = $produto->buscarPorString(busca: "Picanha");
        $this->assertIsArray(actual: $resultado);
    }

    public function testListarRetornaArray(): void
    {
        $produto = new Produto();
        $resultado = $produto->listar();
        $this->assertIsArray(actual: $resultado);
    }
}
