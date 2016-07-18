<?php

/**
 * Created by PhpStorm.
 * User: bert
 * Date: 7/8/16
 * Time: 7:51 AM
 */
class Conf {

  private $file;
  private $xml;
  private $lastmatch;

  public function __construct($file) {
    $this->file = $file;
    if (!is_file($file)) {
      throw new FileException("File '$file' does not exist!");
    }
    $this->xml = simplexml_load_file($file, NULL, LIBXML_NOERROR);
    if (!is_object($this->xml)) {
      throw new XmlException(libxml_get_last_error());
    }

    var_dump(gettype($this->xml));
    $matches = $this->xml->xpath('/conf');
    if (!count($matches)) {
      throw new ConfException("Could not find root element: conf");
    }
  }

  /**
   *  Writes file contents to XML object.
   */
  public function write() {
    if (!is_writable($this->file)) {
      throw new FileException("File '{$this->file}' is not writable ");
    }
    file_put_contents($this->file, $this->xml->asXML());
  }

  /**
   * @param $str
   * @return string
   */
  public function get($str) {
    $matches = $this->xml->xpath("/conf/item[@name=\"$str\"]");;
    if (!count($matches)) {
      return NULL;
    }
    $this->lastmatch = $matches[0];
    return (string)$matches[0];
  }

  public function set($key, $value) {
    if (!is_null($this->get($key))) {
      $this->lastmatch[0] = $value;
      return;
    }

    $conf = $this->xml->conf;
    $this->xml->addChild('item', $value)->addAttribute('name', $key);
  }

}

class XmlException extends Exception {

  private $error;

  /**
   * XmlException constructor.
   * @param $error
   */
  public function __construct( LibXMLError $error) {
    $shortfile = basename($error->file);
    $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
    $this->error = $error;
    parent::__construct();
  }


  public function getLibXmlError() {
    return $this->error;
  }
}

class FileException extends Exception {}
class ConfException extends Exception {}

class Runner {
  static function init() {
    try {
      $fh = fopen("./log.txt", "a");
      fputs($fh, "start" . PHP_EOL);
      $conf = new Conf(dirname(__FILE__). "/testing.xml");
      var_dump($conf->get('user'));
      var_dump($conf->get('host'));
      $conf->set('pass', 'mynewpass');
      $conf->write();
    } catch (FileException $e) {
      // Permissions issue of non-existent file.
      fputs($fh, "File exception" . PHP_EOL);
    } catch (XmlException $e) {
      // broken XML.
      fputs($fh, "Xml exception" . PHP_EOL);
    } catch (ConfException $e) {
      // wrong kind of XML file.
      fputs($fh, "Conf exception" . PHP_EOL);
    } catch (Exception $e) {
      // Backup : should never be called.
    } finally {
      fputs($fh,"end" . PHP_EOL);
      fclose($fh);
    }
  }
}

Runner::init();

/*
try {
  $conf = new Conf('testing.XML');
  var_dump($conf->get('user'));
  var_dump($conf->get('host'));
  $conf->set('pass', 'mynewpass');
  $conf->write();
} catch (Exception $e) {
  var_dump($e->getMessage());
  exit(0);
}*/
