<?php 

declare(strict_types=1);

namespace Models;

class Funcionario
{   
    private int $id;
    private string $nome;
    private String $rg;
    private string $cpf;
    private string $email;
    private string $celular;
    private string $telefone;
    private string $senha;
    private string $cargo;
    private int $nivelAcesso;
    private string $cep;
    private string $endereco;
    private string $numero;
    private string $bairro;
    private string $cidade;
    private string $complemento;
    private string $estado;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getRg(): string
    {
        return $this->rg;
    }

    public function setRg(string $rg): void
    {
        $this->rg = $rg;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getCelular(): string
    {
        return $this->celular;
    }

    public function setCelular(string $celular): void
    {
        $this->celular = $celular;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function getNivelAcesso(): int
    {
        return $this->nivelAcesso;
    }

    public function setNivelAcesso(int $nivelAcesso): void
    {
        $this->nivelAcesso = $nivelAcesso;
    }

    public function getCep(): string
    {
        return $this->cep;
    }

    public function setCep(string $cep): void
    {
        $this->cep = $cep;
    }

    public function getEndereco(): string
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): void
    {
        $this->numero = $numero;
    }

    public function getBairro(): string
    {
        return $this->bairro;
    }

    public function setBairro(string $bairro): void
    {
        $this->bairro = $bairro;
    }

    public function getCidade(): string
    {
        return $this->cidade;
    }

    public function setCidade(string $cidade): void
    {
        $this->cidade = $cidade;
    }

    public function getComplemento(): string
    {
        return $this->complemento;
    }

    public function setComplemento(string $complemento): void
    {
        $this->complemento = $complemento;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }


}
