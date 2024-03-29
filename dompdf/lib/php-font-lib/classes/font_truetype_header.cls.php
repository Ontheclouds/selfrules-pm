<?php
/**
 * @package php-font-lib
 * @link    http://php-font-lib.googlecode.com/
 * @author  Fabien Ménager <fabien.menager@gmail.com>
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @version $Id: font_truetype_header.cls.php 47 2012-04-10 11:46:29Z fabien.menager $
 */

require_once dirname(__FILE__)."/font_header.cls.php";

/**
 * TrueType font file header.
 * 
 * @package php-font-lib
 */
class Font_TrueType_Header extends Font_Header {
  protected $def = array(
    "format"        => self::uint32,
    "numTables"     => self::uint16,
    "searchRange"   => self::uint16,
    "entrySelector" => self::uint16,
    "rangeShift"    => self::uint16,
  );
  
  public function parse(){
    parent::parse();
    
    $format = $this->data["format"];
    $this->data["formatText"] = $this->convertUInt32ToStr($format);
  }
}