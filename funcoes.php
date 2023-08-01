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
