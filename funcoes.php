<?php

/**
 * Verifica o local do servidor.
 * Produção ou desenvolvimento.
 * @return bool
 */
function localhost(): bool
{
  $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');

  return $servidor == 'localhost' ? true : false;
}

/**
 * Cria url do servidor.
 * @return string
 */
function url(string $url): string
{
  $ambiente = localhost() ? URL_DESENVOLVIMENTO : URL_PRODUCAO;

  return str_starts_with($url, '/') ? $ambiente . $url : $ambiente . '/' . $url;
}

/**
 * Entrega uma string com a data atual
 * @return string
 */
function dataAtual(): string
{
  $diaMes = date('d');
  $diaSemana = date('w');
  $mes = date('n');
  $ano = date('Y');

  $dias_da_semana =
    [
      'Domingo',
      'Segunda-Feira',
      'Terça-Feira',
      'Quarta-Feira',
      'Quinta-Feira',
      'Sexta-Feira',
      'Sábado'
    ];

  $meses = [
    1 => 'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
  ];

  $dataFormatada = $dias_da_semana[$diaSemana] . ', ' . $diaMes . ' de ' . $meses[$mes] . ' de ' . $ano;

  return $dataFormatada;
}
