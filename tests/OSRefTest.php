<?php

  namespace PHPCoord;

  require_once(__DIR__.'/../OSRef.php');
  require_once(__DIR__.'/../LatLng.php');
  require_once(__DIR__.'/../RefEll.php');
  require_once(__DIR__.'/../UTMRef.php');

  class OSRefTest extends \PHPUnit_Framework_TestCase {
    
    public function testToString() {
      
      $OSRef = new OSRef(530140, 184184);
      $expected = "(530140, 184184)";
      
      self::assertEquals($expected, $OSRef->__toString());
    }
    
    public function testLatLngWorkHQ() {
    
      $OSRef = new OSRef(530140, 184184);
      $LatLng = $OSRef->toLatLng();
      
      $expected = "(51.54105, -0.12319)";
       
      self::assertEquals($expected, $LatLng->__toString());
    }
    
    public function testLatLngOSWorkedExample() {
    
      $OSRef = new OSRef(651410, 313177);
      $LatLng = $OSRef->toLatLng();
    
      $expected = "(52.65757, 1.71792)";
       
      self::assertEquals($expected, $LatLng->__toString());
    }
    
    public function testToSixFigureString() {
    
      $OSRef = new OSRef(530140, 184184);
   
      $expected = 'TQ301842';
    
      self::assertEquals($expected, $OSRef->toSixFigureString());
    }
    
    public function testFromSixFigureString() {
    
      $OSRef = OSRef::getOSRefFromSixFigureReference('TQ301842');
      $expected = "(530100, 184200)";
    
      self::assertEquals($expected, $OSRef->__toString());
    }
    

  }