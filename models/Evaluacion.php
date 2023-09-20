<?php

namespace Model;

class Evaluacion extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'evaluacion';
    protected static $columnasDB = ['id', 'calificacionFinal', 'nivelEsperado', 'desviacion', 'año', 'compromiso', 'r1', 'r2', 'r3', 'r4', 'integridad', 'r5', 'r6', 'r7', 'pasion', 'r7', 'r8', 'r9', 'r10', 'r11', 'sinergia', 'r12', 'r13', 'r14', 'maestria', 'r15', 'r16', 'r17', 'comunicacion', 'r18', 'r19', 'liderazgo', 'r20', 'r21', 'r22', 'r23', 'r24', 'r25', 'r26', 'efectividad', 'r27', 'r28', 'r29', 'r30', 'r31', 'r32', 'funciones_esp_area', 'r33', 'r34', 'r35', 'r36', 'r37', 'r38', 'r39', 'r40', 'r41', 'r42', 'r43', 'r44', 'r45', 'r46', 'r47', 'r48', 'anfitriones_id'];

    public $id;
    public $calificacionFinal;
    public $nivelEsperado;
    public $desviacion;
    public $año;
    public $compromiso;
    public $r1;
    public $r2;
    public $r3;
    public $r4;
    public $integridad;
    public $r5;
    public $r6;
    public $r7;
    public $pasion;
    public $r8;
    public $r9;
    public $r10;
    public $r11;
    public $sinergia;
    public $r12;
    public $r13;
    public $r14;
    public $maestria;
    public $r15;
    public $r16;
    public $r17;
    public $comunicacion;
    public $r18;
    public $r19;
    public $liderazgo;
    public $r20;
    public $r21;
    public $r22;
    public $r23;
    public $r24;
    public $r25;
    public $r26;
    public $efectividad;
    public $r27;
    public $r28;
    public $r29;
    public $r30;
    public $r31;
    public $r32;
    public $funciones_esp_area;
    public $r33;
    public $r34;
    public $r35;
    public $r36;
    public $r37;
    public $r38;
    public $r39;
    public $r40;
    public $r41;
    public $r42;
    public $r43;
    public $r44;
    public $r45;
    public $r46;
    public $r47;
    public $r48;
    public $anfitriones_id;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->calificacionFinal = $args['calificacionFinal'] ?? '';
        $this->nivelEsperado = $args['nivelEsperado'] ?? '';
        $this->desviacion = $args['desviacion'] ?? '';
        $this->año = $args['año'] ?? '';
        $this->compromiso = $args['compromiso'] ?? '';
        $this->r1 = $args['r1'] ?? '';
        $this->r2 = $args['r2'] ?? '';
        $this->r3 = $args['r3'] ?? '';
        $this->r4 = $args['r4'] ?? '';
        $this->integridad = $args['integridad'] ?? '';
        $this->r5 = $args['r5'] ?? '';
        $this->r6 = $args['r6'] ?? '';
        $this->r7 = $args['r7'] ?? '';
        $this->pasion = $args['pasion'] ?? '';
        $this->r8 = $args['r8'] ?? '';
        $this->r9 = $args['r9'] ?? '';
        $this->r10 = $args['r10'] ?? '';
        $this->r11 = $args['r11'] ?? '';
        $this->sinergia = $args['sinergia'] ?? '';
        $this->r12 = $args['r12'] ?? '';
        $this->r13 = $args['r13'] ?? '';
        $this->r14 = $args['r14'] ?? '';
        $this->maestria = $args['maestria'] ?? '';
        $this->r15 = $args['r15'] ?? '';
        $this->r16 = $args['r16'] ?? '';
        $this->r17 = $args['r17'] ?? '';
        $this->comunicacion = $args['comunicacion'] ?? '';
        $this->r18 = $args['r18'] ?? '';
        $this->r19 = $args['r19'] ?? '';
        $this->liderazgo = $args['liderazgo'] ?? '';
        $this->r20 = $args['r20'] ?? '';
        $this->r21 = $args['r21'] ?? '';
        $this->r22 = $args['r22'] ?? '';
        $this->r23 = $args['r23'] ?? '';
        $this->r24 = $args['r24'] ?? '';
        $this->r25 = $args['r25'] ?? '';
        $this->r26 = $args['r26'] ?? '';
        $this->efectividad = $args['efectividad'] ?? '';
        $this->r27 = $args['r27'] ?? '';
        $this->r28 = $args['r28'] ?? '';
        $this->r29 = $args['r29'] ?? '';
        $this->r30 = $args['r30'] ?? '';
        $this->r31 = $args['r31'] ?? '';
        $this->r32 = $args['r32'] ?? '';
        $this->funciones_esp_area = $args['funciones_esp_area'] ?? '';
        $this->r33 = $args['r33'] ?? '';
        $this->r34 = $args['r34'] ?? '';
        $this->r35 = $args['r35'] ?? '';
        $this->r36 = $args['r36'] ?? '';
        $this->r37 = $args['r37'] ?? '';
        $this->r38 = $args['r38'] ?? '';
        $this->r39 = $args['r39'] ?? '';
        $this->r40 = $args['r40'] ?? '';
        $this->r41 = $args['r41'] ?? '';
        $this->r42 = $args['r42'] ?? '';
        $this->r43 = $args['r43'] ?? '';
        $this->r44 = $args['r44'] ?? '';
        $this->r45 = $args['r45'] ?? '';
        $this->r46 = $args['r46'] ?? '';
        $this->r47 = $args['r47'] ?? '';
        $this->r48 = $args['r48'] ?? '';
        $this->anfitriones_id = $args['anfitriones_id'] ?? '';
    }

    // Busca los resultados de evaluacion por id del anfitrion
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE anfitriones_id = '$id'"; //Tuve qeue poner '' para la consulta
        $resultado = self::consultarSQL($query);
        return array_shift( $resultado ) ;
    }

}