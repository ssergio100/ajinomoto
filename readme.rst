Projeto de para testar alguns conceitos de WebApp
*********************************************************
Desenvolvido com:
Codeigniter
Materialize  - framework baseado no Material Design do Google
Jquery.js
Pace.js
db.js

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


*************************************** BANCO DE DADOS **********************

CREATE DATABASE sergio

 CREATE TABLE public.lojas (
  id SERIAL,
  razao_social VARCHAR(255),
  cnpj VARCHAR(20),
  ativo INTEGER DEFAULT 1 NOT NULL,
  CONSTRAINT lojas_pkey PRIMARY KEY(id)
) 
WITH (oids = false);

ALTER TABLE public.lojas
  ALTER COLUMN id SET STATISTICS 0;

ALTER TABLE public.lojas
  ALTER COLUMN razao_social SET STATISTICS 0;

ALTER TABLE public.lojas
  ALTER COLUMN cnpj SET STATISTICS 0;





