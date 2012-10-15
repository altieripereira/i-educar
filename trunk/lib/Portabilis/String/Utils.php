<?php

/**
 * i-Educar - Sistema de gestão escolar
 *
 * Copyright (C) 2006  Prefeitura Municipal de Itajaí
 *                     <ctima@itajai.sc.gov.br>
 *
 * Este programa é software livre; você pode redistribuí-lo e/ou modificá-lo
 * sob os termos da Licença Pública Geral GNU conforme publicada pela Free
 * Software Foundation; tanto a versão 2 da Licença, como (a seu critério)
 * qualquer versão posterior.
 *
 * Este programa é distribuí­do na expectativa de que seja útil, porém, SEM
 * NENHUMA GARANTIA; nem mesmo a garantia implí­cita de COMERCIABILIDADE OU
 * ADEQUAÇÃO A UMA FINALIDADE ESPECÍFICA. Consulte a Licença Pública Geral
 * do GNU para mais detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Pública Geral do GNU junto
 * com este programa; se não, escreva para a Free Software Foundation, Inc., no
 * endereço 59 Temple Street, Suite 330, Boston, MA 02111-1307 USA.
 *
 * @author    Lucas D'Avila <lucasdavila@portabilis.com.br>
 * @category  i-Educar
 * @license   @@license@@
 * @package   Portabilis
 * @since     Arquivo disponível desde a versão 1.1.0
 * @version   $Id$
 */

require_once 'lib/Portabilis/Array/Utils.php';

/**
 * Portabilis_String_Utils class.
 *
 * @author    Lucas D'Avila <lucasdavila@portabilis.com.br>
 * @category  i-Educar
 * @license   @@license@@
 * @package   Portabilis
 * @since     Classe disponível desde a versão 1.1.0
 * @version   @@package_version@@
 */
class Portabilis_String_Utils {

  // wrapper for Portabilis_Array_Utils::merge
  protected static function mergeOptions($options, $defaultOptions) {
    return Portabilis_Array_Utils::merge($options, $defaultOptions);
  }

  /* splits a string in a array, eg:

    $divisors = array('-', ' '); // or $divisors = '-';
    $options = array('limit' => 2, 'trim' => true);

    Portabilis_String_Utils::split($divisors, '123 - Some value', $options);
      => array([0] => '123', [1] => 'Some value');
   */
  public static function split($divisors, $string, $options = array()) {
    $result         = array($string);

    $defaultOptions = array('limit' => -1, 'trim' => true);
    $options        = self::mergeOptions($options, $defaultOptions);

    if (! is_array($divisors))
      $divisors = array($divisors);

    foreach ($divisors as $divisor) {
      if (is_numeric(strpos($string, $divisor))) {
        $result = split($divisor, $string, $options['limit']);
        break;
      }
    }

    if ($options['trim'])
      $result = Portabilis_Array_Utils::trim($result);

    return $result;
  }
}
?>
