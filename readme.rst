Projeto de para testar alguns conceitos de WebApp
*********************************************************
-Desenvolvido com:

-Codeigniter

-Materialize

-Jquery.js

-Pace.js

-db.js


Fotos :

Da acesso ao botão para submeter fotos. 
As fotos podem ser capturadas com a câmera do celular ou localizadas no  armazenamento;
* As fotos são armazenadas em base64 no banco de dados do navegador.

Sincronizar:
Submete as fotos armazenadas no banco do navegador para um banco de um servidor remoto
* fotos repetidas não são enviadas;

Painel:
Mostra as fotos que foram enviadas para o servidor, e permitem que sejam aprovadas ou reprovadas.
* após aprovar ou reprovar as fotos somem desta interface.

** Para acessar via dispositivo móvel pode ser necessario usar o ip do servidor web na configuração da
base_url.
application/config/config.php linha 26


******************* BANCO DE DADOS **********************


application/config/database.php 

    'hostname' => '',
	'username' => '',
	'password' => '',
	'database' => 'sergio',
	'dbdriver' => 'postgre',

CREATE TABLE public.fotos (
  id SERIAL,
  nome_md5 VARCHAR(255) NOT NULL,
  imagem_path VARCHAR(255) NOT NULL,
  nome VARCHAR(255),
  data TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT now() NOT NULL,
  ativo INTEGER DEFAULT 1 NOT NULL,
  aprovada INTEGER DEFAULT '-1'::integer NOT NULL,
  ext VARCHAR(4),
  CONSTRAINT fotos_pkey PRIMARY KEY(id)
) 
WITH (oids = false);

COMMENT ON COLUMN public.fotos.nome_md5
IS 'md5 gerado atravez do base 64 da imagem';





