<?php


namespace Config;

// Diretor que orquestra o processo de construção
class Director
{
    private DatabaseBuilder $builder;

    public function __construct(DatabaseBuilder $builder)
    {
        $this->builder = $builder;
    }

    public function buildConnection(): DatabaseConnection
    {
        return $this->builder
            ->setHost('localhost')
            ->setPort(3306)
            ->setDatabase('gestao_processos')
            ->setUsername('root')
            ->setPassword('@2368921')
            ->getResult();
    }
// se tivesse outro tipo de bd bex : postsql, mongo etc ou um bd pra produção ia colocar igual o modelo de cima
}
