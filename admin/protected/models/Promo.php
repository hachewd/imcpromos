<?php

/**
 * This is the model class for table "promociones".
 *
 * The followings are the available columns in table 'promociones':
 * @property integer $id_promocion
 * @property integer $es_destacado
 * @property string $titular
 * @property string $destacado
 * @property string $descripcion
 * @property string $imagen
 * @property integer $visible
 * @property string $fecha_inicio
 * @property string $fecha_final
 * @property integer $usuario_creador
 * @property string $fecha_creacion
 * @property integer $usuario_modificador
 * @property string $fecha_modificacion
 */
class Promo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'promociones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('es_destacado, titular, destacado, descripcion, imagen, visible, fecha_inicio, fecha_final, usuario_creador, fecha_creacion, usuario_modificador, fecha_modificacion', 'required'),
			array('es_destacado, visible, usuario_creador, usuario_modificador', 'numerical', 'integerOnly'=>true),
			array('titular, destacado, imagen', 'length', 'max'=>255),
			array('descripcion', 'length', 'max'=>1024),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_promocion, es_destacado, titular, destacado, descripcion, imagen, visible, fecha_inicio, fecha_final, usuario_creador, fecha_creacion, usuario_modificador, fecha_modificacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_modificador'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_promocion' => 'Id Promocion',
			'es_destacado' => 'Es Destacado',
			'titular' => 'Titular',
			'destacado' => 'Destacado',
			'descripcion' => 'Descripcion',
			'imagen' => 'Imagen',
			'visible' => 'Visible',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_final' => 'Fecha Final',
			'usuario_creador' => 'Usuario Creador',
			'fecha_creacion' => 'Fecha Creacion',
			'usuario_modificador' => 'Usuario Modificador',
			'fecha_modificacion' => 'Fecha Modificacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_promocion',$this->id_promocion);
		$criteria->compare('es_destacado',$this->es_destacado);
		$criteria->compare('titular',$this->titular,true);
		$criteria->compare('destacado',$this->destacado,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('visible',$this->visible);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_final',$this->fecha_final,true);
		$criteria->compare('usuario_creador',$this->usuario_creador);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('usuario_modificador',$this->usuario_modificador);
		$criteria->compare('fecha_modificacion',$this->fecha_modificacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}