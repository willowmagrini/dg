<?php
/** 
 * As configurações básicas do WordPress.
 *
 * Esse arquivo contém as seguintes configurações: configurações de MySQL, Prefixo de Tabelas,
 * Chaves secretas, Idioma do WordPress, e ABSPATH. Você pode encontrar mais informações
 * visitando {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. Você pode obter as configurações de MySQL de seu servidor de hospedagem.
 *
 * Esse arquivo é usado pelo script ed criação wp-config.php durante a
 * instalação. Você não precisa usar o site, você pode apenas salvar esse arquivo
 * como "wp-config.php" e preencher os valores.
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar essas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'deepgeek1');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'deepgeek1');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'coringao83');

/** nome do host do MySQL */
define('DB_HOST', 'mysql01.deepgeek1.hospedagemdesites.ws');
// define('DB_HOST', 'deepgeek1.mysql.dbaas.com.br');

/** Conjunto de caracteres do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8');

/** O tipo de collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');
define('WP_MEMORY_LIMIT', '256M');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer cookies existentes. Isto irá forçar todos os usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'KTyLw&AbWSz!NR09k<Wj~VMLdCe78i*0@Ei2g__S|@5msPOi^WZ7v$OsVboHRTuB');
define('SECURE_AUTH_KEY',  '1m@@bk):D!3YX&B;o.aX/mU9z}kAG+$}Sy[N=2++M_<BMQ7^S%VZ{)hP7W_LL-_z');
define('LOGGED_IN_KEY',    'VXY]L==RiubJueejDE]SAc=Q{-+%#W_ZVu|(1$Fv1zf-=T2#$^,NV_b%-EmdNTCY');
define('NONCE_KEY',        'H $tmZt[7f_JbnjvL~f<T31<|!cqX8+E.)|_2JSOuX4h6!_B%i01&_2V9`5B#fPT');
define('AUTH_SALT',        'uBYiGNRc)rN=Ov%Hxl>-YgH^XWD#%<2$+pCt*`[JVsV}p)HRxX~H_]9{cQFq-nD%');
define('SECURE_AUTH_SALT', '[eu2#l.>gSnZgqZv`70Ev&`:^7Ngn#5841hKcQC`zzXBc*J?-CH+s!R1x-8[e~%g');
define('LOGGED_IN_SALT',   'YRm,a*M*Nygc@g-Zyflczd<t})KAZ |5jWQHVkQYxzjAw~8~6[R@H1A]((*-6a$i');
define('NONCE_SALT',       '!vHr`?|Ju!~@C>pW,%EK#W6<FVOc;)<_M{- -`_Z?4ur|zEqMe1lv,WQ.>X0hv,v');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der para cada um um único
 * prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'wpdg_';


/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * altere isto para true para ativar a exibição de avisos durante o desenvolvimento.
 * é altamente recomendável que os desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 */
define('WP_DEBUG', false);

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
	
/** Configura as variáveis do WordPress e arquivos inclusos. */
require_once(ABSPATH . 'wp-settings.php');
