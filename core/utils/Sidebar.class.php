<?php

	Class SidebarCollapse{

		public $arraySections;

		public function __construct(){

			$this->arraySections = array(
				"Empresa"	=> array(
										"titulos"				=> array(
																							"Datos Empresa"
																						),
										"href"					=> array(
																							"?view=datosEmpresa"
																						),
										"subsecciones"	=> array(
																							"Cuenta"	=>	array(
																																		"titulo"	=> "Datos Cuenta",
																																		"href"		=> "?view=datosCuenta"
																																 ),
																							"href"		=>	"#SubMenu1"
																						)
									),


				"Web"		=> array(
										"titulos"				=> array(
																								"Banner Presupuesto",
																								"Otros Articulos"
																						),
										"href"					=> array(
																								"?view=bannerPresupuesto",
																								"?view=otherArts"
																						),
										"subsecciones"	=> array(
																							"Datos Generales"	=> array(
																																					"titulo"	=> array(
																																																"Datos Header",
																																																"Datos Footer"
																																														),
																																					"href"		=> array(
																																															"?view=datosHeader",
																																															"?view=datosFooter"
																																														)
																																				),
																							"Home"				=> array(
																															"titulo"	=> array(
																																									"Metatags",
																																									"Slider",
																																									"Contenido",
																																									"Articulos Linkeados"
																																								),
																															"href"		=> array(
																																									"?view=web/metatags&idSeccion=1",
																																									"?view=homeSlider",
																																									"?view=homeContent",
																																									"?view=homeLinkedArts"
																																								)
																														),
																							"Nosotros"			=> array(),
																							"Servicios"			=> array(),
																							"Galeria"			=> array(),
																							"Capacitaciones"	=> array(),
																							"Empleo"			=> array()
																						)
									)
			);

		}

		public function getSections(){
			echo '<pre>';
			print_r($this->arraySections);
			echo '</pre>';
		}


		public function makeSidebarHtml(){

			$sidebar = $this->arraySections;

			foreach($sidebar as $section => $datosSection){
				echo $section . '<br />';

				foreach($datosSection as $datos => $value){
					echo '>' . $datos . '<br />';
					echo 'count: ' . count($value) . '<br />';
					print_r($value);
					echo '<br />';
					foreach($datosSection[$datos] as $key){
						echo 'key: ' .$key . '<br />';
					}

				}

				echo '********* <br />';

			}

		}


	}

?>
