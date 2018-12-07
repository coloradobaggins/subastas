<?php

/**
 * Created by Atom.
 * User: coloBaggins
 * Date: 19/9/18
 * Time: 23:38
 */
class AutosSubasta
{

    private $idAuto;
    private $id_vendedor;
    private $marca;
    private $modelo;
    private $ano;
    private $dominio;
    private $kms;
    private $radicacion;
    private $ubicacion;
    private $id_combustible;
    private $arranca;
    private $iva_incluido;
    private $comision;
    private $observacion;
    private $deuda_patente;
    private $deuda_infr_caba;
    private $deuda_infr_bsas;
    private $visita_observaciones;
    private $visita_puntaje;
    private $visita_valor_aprox;
    private $valor_puja;
    private $precio_lista;
    private $gastos_aprox_gestor;
    private $url_narvaez;
    private $fecha_cierre;
    private $hora_cierre;
    private $fecha;
    private $hora;
    private $id_usuario;
    private $estado;

    private $objConexion;
    public function __construct()
    {
      $this->objConexion = Conexion::getInstance();
    }

    public function getDatosAutos($f_estado = 1){

      $arrayResponse = array();


      $sql = "SELECT id, id_vendedor, marca, modelo, ano, dominio, kms, radicacion, ubicacion, id_combustible,
                    arranca, iva_incluido, comision, observacion, deuda_patente, deuda_infr_caba, deuda_infr_bsas,
                    visita_observaciones, visita_puntaje, visita_valor_aprox, valor_puja, precio_lista, gastos_aprox_gestor,
                    url_narvaez, fecha_cierre, hora_cierre, comprado, fecha, hora, id_usuario, estado
              FROM subastas_autos
              WHERE estado LIKE ?";

      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('i', $f_estado);
      $status = $stmt->execute();
      $stmt->bind_result($id, $id_vendedor, $marca, $modelo, $ano, $dominio, $kms, $radicacion, $ubicacion, $id_combustible, $arranca, $iva_incluido,
            $comision, $observacion, $deuda_patente,$deuda_infr_caba, $deuda_infr_bsas, $visita_observaciones, $visita_puntaje, $visita_valor_aprox,
            $valor_puja, $precio_lista, $gastos_aprox_gestor, $url_narvaez, $fecha_cierre, $hora_cierre, $comprado, $fecha, $hora, $id_usuario, $estado);


      if(!$stmt->errno){
        while($stmt->fetch()){

          $arrayResponse[$id] = array(
            "id"  => $id,
            "id_vendedor" => $id_vendedor,
            "marca" => $marca,
            "modelo"  => $modelo,
            "ano" => $ano,
            "dominio" => $dominio,
            "kms" => $kms,
            "radicacion"  => $radicacion,
            "ubicacion" => $ubicacion,
            "id_combustible" => $id_combustible,
            "arranca" => $arranca,
            "iva_incluido"  => ($iva_incluido==1) ? "Si" : "N/A",
            "comision" => $comision,
            "comision_valor"  => $this->calcularComision($comision, $valor_puja),
            "observacion" => $observacion,
            "deuda_patente" => $deuda_patente,
            "deuda_infr_caba" => $deuda_infr_caba,
            "deuda_infr_bsas" => $deuda_infr_bsas,
            "visita_observaciones"  => $visita_observaciones,
            "visita_puntaje"  => $visita_puntaje,
            "visita_valor_aprox"  => $visita_valor_aprox,
            "valor_puja" => $valor_puja,
            "precio_lista"  => $precio_lista,
            "gastos_aprox_gestor" => $gastos_aprox_gestor,
            "url_narvaez" => $url_narvaez,
            "fecha_cierre"  => $fecha_cierre,
            "hora_cierre" => $hora_cierre,
            "comprado"  => $comprado,
            "fecha" => $fecha,
            "hora"  => $hora,
            "id_usuario"  => $id_usuario,
            "estado"  => $estado
          );
        }
      }else{
        throw new Exception("Error en la consulta de autos, ".$stmt->error, $stmt->errno);
      }
      $stmt->free_result();
      $stmt->close();

      return $arrayResponse;
    }

    //Comision Subasta
    //Recibe porcentaje de la comision, ej 10%
    private function calcularComision($comision, $valor_puja){
      return (($comision*$valor_puja)/100);
    }

    //No se tiene en cuenta el gasto del gestor
    public function calcularGastosTotales($puja, $ivaIncluido, $d_patente, $d_caba, $d_bsas, $gastosAdmConIva, $comision_valor, $otrosGastos, $g_gestoria){

      //echo "puja: ".$puja. " - ivaIncluido: ". $ivaIncluido." - d pat: ". $d_patente." - d caba: ". $d_caba." - d bsas: ". $d_bsas." - gastosADMconIVa: ". $gastosAdmConIva." - comision: ". $comision_valor." - otrosGastos: ". $otrosGastos." - g gestoria: ".$g_gestoria." <br />";



      $iva = 21;
      $arrayResponse = array();

      //Si la subasta no contempla IVA incuido, calcular IVA para monto final oferta puja
      $montoIvaSubasta = 0;
      if($ivaIncluido==0){
        $montoIva = ($iva * $puja) / 100;
      }


      //Sumar patentes, deudas capita, deudas bs as
      $deudaTotal = $d_patente + $d_caba + $d_bsas;

      //Suma Total a pagar:
      $totalAPagar = $puja + $gastosAdmConIva + $comision_valor + $otrosGastos + $g_gestoria;




      $arrayResponse = array(
        "deudaTotal"        => $deudaTotal,
        "montoIvaSubasta"   => $montoIvaSubasta,
        "totalAPagar"       => $totalAPagar
      );


      return $arrayResponse;
    }


    public function addPuja($idAuto, $puja){

      $sql = "UPDATE subastas_autos SET valor_puja = ? WHERE id = ?";
      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('ii', $puja, $idAuto);
      $status = $stmt->execute();
      $stmt->store_result();

      if(!$stmt->errno){
        return "affected row: ".$stmt->affected_rows;
      }else{
        throw new Exception("Error al actualizar puja, ".$stmt->error, $stmt->errno);
      }

    }



    public function addAuto(){

      $idVendedor   = $this->id_vendedor;
      $marca        = $this->marca;
      $modelo       = $this->modelo;
      $ano          = $this->ano;
      $dom          = $this->dominio;
      $kms          = $this->kms;
      $rad          = $this->radicacion;
      $ubi          = $this->ubicacion;
      $comb         = $this->id_combustible;
      $arranca      = $this->arranca;
      $ivaI         = $this->iva_incluido;
      $comision     = $this->comision;
      $obs          = $this->observacion;
      $d_pat        = $this->deuda_patente;
      $d_inf_caba   = $this->deuda_infr_caba;
      $d_inf_bsas   = $this->deuda_infr_bsas;
      $obs_vis      = $this->visita_observaciones;
      $vis_pun      = $this->visita_puntaje;
      $vis_val_aprox = $this->visita_valor_aprox;
      $valor_puja   = $this->valor_puja;
      $precio_lista = $this->precio_lista;
      $g_aprox_ges  = $this->gastos_aprox_gestor;
      $url_narvaez  = $this->url_narvaez;
      $fecha_cierre = $this->fecha_cierre;
      $hora_cierre  = $this->hora_cierre;

      $comprado     = 0;
      $fechaCarga   = date("Y-m-d");
      $horaCarga    = date("H:i:s");
      $userCarga    = $_SESSION['id'];

      $sql = "INSERT INTO subastas_autos
      (id_vendedor, marca, modelo, ano, dominio, kms, radicacion, ubicacion, id_combustible,
                    arranca, iva_incluido, comision, observacion, deuda_patente, deuda_infr_caba, deuda_infr_bsas,
                    visita_observaciones, visita_puntaje, visita_valor_aprox, valor_puja, precio_lista, gastos_aprox_gestor,
                    url_narvaez, fecha_cierre, hora_cierre, comprado, fecha, hora, id_usuario, estado)
       VALUES
       (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";

       $stmt = $this->objConexion->mysqli->prepare($sql);
       $stmt->bind_param('issisissiiiisiiisiiiiisssissi',$idVendedor, $marca, $modelo, $ano, $dom, $kms, $rad, $ubi, $comb, $arranca,
              $ivaI, $comision, $obs, $d_pat, $d_inf_caba, $d_inf_bsas, $obs_vis, $vis_pun, $vis_val_aprox, $valor_puja, $precio_lista, $g_aprox_ges,
              $url_narvaez, $fecha_cierre, $hora_cierre, $comprado, $fechaCarga, $horaCarga, $userCarga);
       $stmt->execute();
       if(!$stmt->errno){
          return 1;
       }else{
         throw new Exception("Error al agregar nuevo auto a subasta, ".$stmt->error, $stmt->errno);
       }


    }


    public function getDatoAuto($idAuto){
      $arrayResponse = array();

      if(!empty($idAuto)){
        $sql = "SELECT id, id_vendedor, marca, modelo, ano, dominio, kms, radicacion, ubicacion, id_combustible,
                      arranca, iva_incluido, comision, observacion, deuda_patente, deuda_infr_caba, deuda_infr_bsas,
                      visita_observaciones, visita_puntaje, visita_valor_aprox, valor_puja, precio_lista, gastos_aprox_gestor,
                      url_narvaez, fecha_cierre, hora_cierre, comprado, fecha, hora, id_usuario, estado
                FROM subastas_autos
                WHERE id = ?";

        $stmt = $this->objConexion->mysqli->prepare($sql);
        $stmt->bind_param('i', $idAuto);
        $status = $stmt->execute();
        $stmt->bind_result($id, $id_vendedor, $marca, $modelo, $ano, $dominio, $kms, $radicacion, $ubicacion, $id_combustible, $arranca, $iva_incluido,
              $comision, $observacion, $deuda_patente,$deuda_infr_caba, $deuda_infr_bsas, $visita_observaciones, $visita_puntaje, $visita_valor_aprox,
              $valor_puja, $precio_lista, $gastos_aprox_gestor, $url_narvaez, $fecha_cierre, $hora_cierre, $comprado, $fecha, $hora, $id_usuario, $estado);


        if(!$stmt->errno){

          $stmt->fetch();

            $arrayResponse = array(
              "id"  => $id,
              "id_vendedor" => $id_vendedor,
              "marca" => $marca,
              "modelo"  => $modelo,
              "ano" => $ano,
              "dominio" => $dominio,
              "kms" => $kms,
              "radicacion"  => $radicacion,
              "ubicacion" => $ubicacion,
              "id_combustible" => $id_combustible,
              "arranca" => $arranca,
              "iva_incluido"  => ($iva_incluido==1) ? "Si" : "N/A",
              "comision" => $comision,
              "comision_valor"  => $this->calcularComision($comision, $valor_puja),
              "observacion" => $observacion,
              "deuda_patente" => $deuda_patente,
              "deuda_infr_caba" => $deuda_infr_caba,
              "deuda_infr_bsas" => $deuda_infr_bsas,
              "visita_observaciones"  => $visita_observaciones,
              "visita_puntaje"  => $visita_puntaje,
              "visita_valor_aprox"  => $visita_valor_aprox,
              "valor_puja" => $valor_puja,
              "precio_lista"  => $precio_lista,
              "gastos_aprox_gestor" => $gastos_aprox_gestor,
              "url_narvaez" => $url_narvaez,
              "fecha_cierre"  => $fecha_cierre,
              "hora_cierre" => $hora_cierre,
              "comprado"  => $comprado,
              "fecha" => $fecha,
              "hora"  => $hora,
              "id_usuario"  => $id_usuario,
              "estado"  => $estado
            );

        }else{
          throw new Exception("Error en la consulta de autos, ".$stmt->error, $stmt->errno);
        }
        $stmt->free_result();
        $stmt->close();
        return $arrayResponse;

      }else{
        throw new Exception("Error, idAuto no puede ser vacio, debe ser n numero");
      }
    }


    public function comprarAuto($idAuto, $idComprador, $fechaCompra, $monto){

      $arrAutoSubasta = $this->getDatoAuto($idAuto);
      $marca = $arrAutoSubasta['marca'];
      $modelo = $arrAutoSubasta['modelo'];
      $ano = $arrAutoSubasta['ano'];
      $dom = $arrAutoSubasta['dominio'];
      $kms = $arrAutoSubasta['kms'];
      $rad = $arrAutoSubasta['radicacion'];
      $id_comb = $arrAutoSubasta['id_combustible'];
      $arr = $arrAutoSubasta['arranca'];
      $obs = $arrAutoSubasta['observacion'];
      $g_gest = $arrAutoSubasta['gastos_aprox_gestor'];
      //deuda_patente, deuda_infr_caba, deuda_infr_bsas
      $d_pat = $arrAutoSubasta["deuda_patente"];
      $d_infr_caba = $arrAutoSubasta["deuda_infr_caba"];
      $d_infr_bsas = $arrAutoSubasta["deuda_infr_bsas"];
      $u_carga = $_SESSION['id'];
      $f_carga = date('Y-m-d');
      $h_carga = date('H:i:s');

      if(!empty($idAuto) && !empty($idComprador) && !empty($fechaCompra) && !empty($monto)){

        $sql = "INSERT INTO auto_comprado(id_subasta, marca, modelo, ano, dominio, kms, radicacion, id_combustible,
                            arranca, observacion, monto, gastos_gestor, id_usuario_comprador, fecha_compra, id_usuario,
                            fecha, hora, estado)
                      VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";
        $this->objConexion->mysqli->autocommit(FALSE);
        $stmt = $this->objConexion->mysqli->prepare($sql);

        $stmt->bind_param('issisisiisisisiss', $idAuto, $marca, $modelo, $ano, $dom, $kms, $rad, $id_comb, $arr, $obs, $monto, $g_gest, $idComprador, $fechaCompra, $u_carga, $f_carga, $h_carga);
        if($stmt->execute()){

            //Actualizar estado comprado (1) este coche subasta\
            if($this->updateCompradoState($idAuto, 1) == 1){
              $this->objConexion->mysqli->commit();
            }else{
              throw new Exception("Error al cambiar estado de auto subasta a auto comprado",2);
            }

            if(!$stmt->errno){
              return 1;
            }else{
              throw new Exception("Error al ingresar auto compra, ".$stmt->error, $stmt->errno);
            }
        }else{
          throw new Exception("Error ejecutar compra (commit), ".$stmt->error, $stmt->errno);
        }
        $stmt->free_result();
        $stmt->close();
      }else{
        throw new Exception("Error, algunos de los valores estan vacios. Revisar", 1);
      }

    }

    //state = 1compado, 0 no comprado | autosubasta
    private function updateCompradoState($idAuto, $state){

      $sql = "UPDATE subastas_autos SET comprado = ? WHERE id = ?";
      $stmt = $this->objConexion->mysqli->prepare($sql);
      $stmt->bind_param('ii', $state, $idAuto);
      $stmt->execute();
      if(!$stmt->errno){
        return 1;
      }else{
        throw new Exception("Error al actualizar estado autosSubasta - Comprado, ".$stmt->error, $stmt->errno);
      }
      $stmt->free_result();
      $stmt->close();
    }


    //******************************************************//
    //              Access Modifiers                        //
    public function __get($atributo)
    {
        if(property_exists($this, $atributo))
        {
            return $this->$atributo;
        }
        return null;
    }

    /*************************************************/
    //Setters
    public function __set($atributo, $valor)
    {
        if(property_exists($this, $atributo))
        {
            $this-> $atributo = $valor;
        }
        else
        {
            echo "atributo ".$atributo . " No existe";
        }
    }

    public function setDatos($datos=array())
    {
        foreach($datos as $campo => $valor)
        {
            $this->__set($campo, $valor);
        }
    }


}
