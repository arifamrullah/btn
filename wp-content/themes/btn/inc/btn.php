<?php
	require get_template_directory() . '/plugins/faqs/quick-and-easy-faqs.php';
	require get_template_directory() . '/plugins/fancy-admin-ui/fancy-admin-ui.php';
	//require get_template_directory() . '/plugins/rewrite-rules-inspector/rewrite-rules-inspector.php';
	require_once( get_template_directory() . '/titan-framework-checker.php' );

	function btn_get_faq_frontpage_cat(){
		$term = get_term_by( 'slug', 'front-page', 'faq-group', OBJECT );
		$childrens = get_term_children( $term->term_id, 'faq-group');
		return $childrens;
	}

	function btn_get_faq_all_cat(){
		$term = get_term_by( 'slug', 'front-page', 'faq-group', OBJECT );
		$terms = get_terms( 'faq-group', array(
			'orderby'           => 'name',
    		'order'             => 'ASC',
    		'exclude'			=> array($term->term_id)
		) );
		return $terms;
	}

	function btn_get_faq_cat_name($id){
		$term = get_term_by( 'id', $id, 'faq-group', OBJECT );
		return $term->name;
	}

	function btn_get_all_register(){
	  global $wpdb;
	  $reg_sql = "SELECT * FROM btn_registrasirekening ORDER BY REK_ID ASC ";
		$items = $wpdb->get_results($reg_sql, OBJECT_K);
		return $items ;
	}

	function btn_get_all_register_by_id($id=""){
	  global $wpdb;
	  $reg_sql = "SELECT btn.*, btn_d.*
								FROM btn_registrasirekening as btn
								LEFT JOIN btn_registrasirekening_detail as btn_d
								ON btn.REK_ID = btn_d.REK_ID
								WHERE btn.STATUS=0 AND btn.REK_ID=".$id."";
		$items = $wpdb->get_row($reg_sql);
		return $items ;
	}

	function btn_get_type(){
	  global $wpdb;
	  $sql_type = "SELECT * FROM btn_typerekening WHERE STATUS=0 ORDER BY TYPE_ID ASC ";
	  $type = $wpdb->get_results($sql_type, OBJECT_K);
	  if($type){
	    foreach($type as $t){
        $html .= '<option value="'.$t->TYPE_ID.'">'.$t->NAMA_REKENING.'</option>';
			}
	  }
	  return $html;
	}

	//get dropdown product
	function btn_get_product() {
		global $wpdb;
		$sql_type = "SELECT * FROM btn_product ORDER BY ID_PRODUCT ASC";
		$type = $wpdb->get_results( $sql_type, OBJECT_K );
		if ( $type ) {
			foreach ( $type as $t ) {
				$html .= '<option value="'.$t->ID_PRODUCT.'">'.$t->NAME.'</option>';
			}
		}
		return $html;
	}

	//get product by id
	function btn_get_product_by_id( $id = '' ) {
		global $wpdb;
		$sql_type = "SELECT * FROM btn_product WHERE ID_PRODUCT=".$id."";
		$items = $wpdb->get_row( $sql_type );
		return $items;
	}

	//get produk ajax by id
	add_action('wp_ajax_nopriv_btn_ajax_get_product_by_id', 'btn_ajax_get_product_by_id');
	add_action('wp_ajax_btn_ajax_get_product_by_id', 'btn_ajax_get_product_by_id');
	function btn_ajax_get_product_by_id(){
		$id = $_POST['data']['id'];
		// echo $id;die();
		global $wpdb;
	  $sql_type = "SELECT * FROM btn_product WHERE ID_PRODUCT=".$id."";
	  $items = $wpdb->get_row($sql_type);
	  echo json_encode($items);
	  die();
	}

	function btn_get_city($id=''){
		$terms = get_terms( 'city_branch_key', array(
			'orderby'           => 'name',
    		'order'             => 'ASC',
    		'hide_empty' 		=> 0,
    		'parent'			=> 0
		) );
		$html = '';
		if(!empty($terms)){
			foreach($terms as $city){
				$html .= '<option value="'.$city->term_id.'" '.( ($id==$city->term_id)? 'selected' : '' ).'>'.$city->name.'</option>';
			}
		}
		return $html;
	}

	function btn_get_city_by_id($id){
		$term = get_term( $id, 'city_branch_key' );
		if(!empty($term)){
			$html = $term->name;
			return $html;
		}
	}

	function btn_get_substation($city, $id=""){
		$terms = get_terms( 'city_branch_key', array(
			'orderby'           => 'name',
    		'order'             => 'ASC',
    		'hide_empty' 		=> 0,
    		'parent'			=> $city
		) );
		$html = '';
		if(!empty($terms)){
			foreach($terms as $branch){
				$html .= '<option value="'.$branch->term_id.'" '.( ($id==$branch->term_id)? 'selected' : '' ).'>'.$branch->name.'</option>';
			}
		}
		return $html;
	}

	function btn_get_substation_by_id($id){
		$term = get_term( $id, 'city_branch_key' );
		if(!empty($term)){
			$html = $term->name;
			return $html;
		}
	}

	function btn_get_all_loan_application(){
		global $wpdb;
		$reg_sql = "SELECT loan.*, loan.Loan_ID as LID, loan_d.*
		            FROM btn_loanapplication as loan
		            left JOIN btn_loanapplication_detail as loan_d
		            ON loan.ID = loan_d.Loan_ID
		            ORDER BY ID ASC ";
		$items = $wpdb->get_results($reg_sql, OBJECT_K);
		return $items ;
	}

	add_action('wp_ajax_nopriv_btn_ajax_delete_loan_by_id', 'btn_ajax_delete_loan_by_id');
	add_action('wp_ajax_btn_ajax_delete_loan_by_id', 'btn_ajax_delete_loan_by_id');
	function btn_ajax_delete_loan_by_id(){
		$id= $_POST['ID'];;
		global $wpdb;
		$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_loanapplication
				WHERE ID = %d
				",
					array(
						$id
					)
				)
		);
		$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_loanapplication_detail
				WHERE LOAN_ID = %d
				",
					array(
						$id
					)
				)
		);
		echo "success";
		die();
	}

	function generate_ID( $table = "" ) {
		global $wpdb;
		$sql_type = "select max(ID) as ID from ".$table;
		if ( $table == "btn_registrasirekening" ) {
			$sql_type = "select max(REK_ID) as ID from ".$table;
		}
		$latestID = $wpdb->get_row( $sql_type, OBJECT );
		$num_padded = sprintf( "%04d", $latestID->ID + 1 );
		$LeadID = 'ICL-'.date( "ymd" ).'-'.$num_padded;
		return $LeadID;
	}

	function generate_ID2( $table = "btn_cif_relation" ) {
		global $wpdb;
		$sql_type = "select max(id) as id from ".$table;
		$latestID = $wpdb->get_row( $sql_type, OBJECT );
		$num_padded = sprintf( "%04d", $latestID->id + 1 );
		$LeadID = 'ICL-'.date( "ymd" ).'-'.$num_padded;
		return $LeadID;
	}

	function generate_IDpinjaman( $table = "btn_pinjaman" ) {
		global $wpdb;
		$sql_type = "select max(id) as id from ".$table;
		$latestID = $wpdb->get_row( $sql_type, OBJECT );
		$num_padded = sprintf( "%04d", $latestID->id + 1 );
		$LeadID = 'ICL-'.date( "ymd" ).'-'.$num_padded;
		return $LeadID;
	}

	function generateNoReg( $table = "btn_web_service" ) {
		global $wpdb;
		$sql_reg_id = "SELECT no_registrasi FROM ".$table." WHERE no_registrasi LIKE 'ICL".date( "ymd" )."%'";
		$regIDs = $wpdb->get_col( $sql_reg_id );

		if ( empty( $regIDs ) ) {
			$num_padded = sprintf( "%04d", 1 );
		} else {
			$IDs = array_map( "substrArrayID", $regIDs );
		  $maxID = max( $IDs );
			$num_padded = sprintf( "%04d", $maxID + 1 );
		}
		
		$LeadID = 'ICL'.date( "ymd" ).$num_padded;
		return $LeadID;
	}

	function substrArrayID( $regIDs ) {
    $IDs = substr( $regIDs, -4 );
    $intIDs = intval( $IDs );
    return $intIDs;
	}

	add_action('wp_ajax_nopriv_btn_ajax_delete_register_by_id', 'btn_ajax_delete_register_by_id');
	add_action('wp_ajax_btn_ajax_delete_register_by_id', 'btn_ajax_delete_register_by_id');
	function btn_ajax_delete_register_by_id() {
		$id = $_POST['REK_ID'];;
		global $wpdb;
		$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_registrasirekening
				WHERE REK_ID = %d
				",
					array(
						$id
					)
				)
		);
		$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_registrasirekening_detail
				WHERE REK_ID = %d
				",
					array(
						$id
					)
				)
		);
		echo "success";
		die();
	}

	add_action('wp_ajax_nopriv_btn_ajax_get_substation_by_id', 'btn_ajax_get_substation_by_id');
	add_action('wp_ajax_btn_ajax_get_substation_by_id', 'btn_ajax_get_substation_by_id');
	function btn_ajax_get_substation_by_id(){
		$id= $_POST['data']['id'];
		$terms = get_terms( 'city_branch_key', array(
			'orderby'           => 'name',
    		'order'             => 'ASC',
    		'hide_empty' 		=> 0,
    		'parent'			=> $id
		) );
		$html = '';
		if(!empty($terms)){
			foreach($terms as $branch){
				$html .= '<option value="'.$branch->term_id.'" '.( ($id==$branch->term_id)? 'selected' : '' ).'>'.$branch->name.'</option>';
			}
		}
		echo $html;
	}

	add_action('wp_ajax_nopriv_btn_ajax_process_registration', 'btn_ajax_process_registration');
	add_action('wp_ajax_btn_ajax_process_registration', 'btn_ajax_process_registration');
	function btn_ajax_process_registration(){
	  global $wpdb;

	  /* head register */
	  $data_head = null;
	  foreach ($_POST['data']['head'] as $head) {
	    $data_head[$head['name']] = $head['value'];
	  }

	  $data_detail = null;
	  foreach ($_POST['data']['detail'] as $detail) {
	    $data_detail[$detail['name']] = $detail['value'];
	  }
	  $timestamp= strtotime($data_detail['V_TANGGAL']);
	  $tanggal= date("Y-m-d", $timestamp);

	  //Add New
	  //Head Register
	  $table_name = 'btn_registrasirekening';
	  $status = $wpdb->insert(
	    $table_name,
	      array(
	        'REG_ID' => generate_ID($table_name),
	        'JENIS_IDENTITAS' => $data_head['JENIS_IDENTITAS'],
	        'NOMOR_IDENTITAS' => $data_head['NOMOR_IDENTITAS'],
	        'GELAR_SEBELUM_NAMA' => $data_head['GELAR_SEBELUM_NAMA'],
	        'NAMA_IDENTITAS' => $data_head['NAMA_IDENTITAS'],
	        'NAMA_SINGKATAN_PADA_IDENTITAS' => $data_head['NAMA_SINGKATAN_PADA_IDENTITAS'],
	        'NAMA_TANPA_SINGKATAN' => $data_head['NAMA_TANPA_SINGKATAN'],
	        'GELAR_SETELAH_NAMA' => $data_head['GELAR_SETELAH_NAMA'],
	        'KOTA_LAHIR' => $data_head['KOTA_LAHIR'],
	        'TANGGAL_LAHIR' => $data_head['TANGGAL_LAHIR'],
	        'JENIS_KELAMIN' => $data_head['JENIS_KELAMIN'],
	        'STATUS_KAWIN' => $data_head['STATUS_KAWIN'],
	        'KEWARGANEGARAAN' => $data_head['KEWARGANEGARAAN'],
	        'TANGGAL_BERAKHIR_IDENTITAS' => $data_head['TANGGAL_BERAKHIR_IDENTITAS'],
	        'ID_PENDUKUNG' => $data_head['ID_PENDUKUNG'],
	        'NOMOR_ID_PENDUKUNG' => $data_head['NOMOR_ID_PENDUKUNG'],
	        'MASA_MULAI_ID_PENDUKUNG' => $data_head['MASA_MULAI_ID_PENDUKUNG'],
	        'MASA_BERAKHIR_ID_PENDUKUNG' => $data_head['MASA_BERAKHIR_ID_PENDUKUNG'],
	        'PENDIDIKAN_TERAKHIR' => $data_head['PENDIDIKAN_TERAKHIR'],
	        'NAMA_GADIS_IBU_KANDUNG' => $data_head['NAMA_GADIS_IBU_KANDUNG'],
	        'NO_NPWP' => $data_head['NO_NPWP'],
	        'NAMA_GEDUNG'=> $data_head['NAMA_GEDUNG'],
	        'NAMA_JALAN'=> $data_head['NAMA_JALAN'],
	        'RTRW' => $data_head['RTRW'],
	        'KELURAHAN' => $data_head['KELURAHAN'],
	        'KECAMATAN' => $data_head['KECAMATAN'],
	        'KOTA_KABUPATEN' => $data_head['KOTA_KABUPATEN'],
	        'KODEPOS' => $data_head['KODEPOS'],
	        'NEGARA'=> $data_head['NEGARA'],
	        'ALAMAT_PADA_IDENTITAS' => $data_head['ALAMAT_PADA_IDENTITAS'],
	        'NO_TELP1' => $data_head['NO_TELP1'].' '.$data_head['NO_TELP11'],
	        'NO_TELP2' => $data_head['NO_TELP2'].' '.$data_head['NO_TELP22'],
	        'NO_PONSEL1' => $data_head['NO_PONSEL1'],
	        'NO_PONSEL2' => $data_head['NO_PONSEL2'],
	        'NO_PONSEL_LUAR' => $data_head['NO_PONSEL_LUAR'],
	        'EMAIL' => $data_head['EMAIL'],
	        'JENIS_PEKERJAAN' => $data_head['JENIS_PEKERJAAN'],
	        'JABATAN' => $data_head['JABATAN'],
	        'DEPARTEMEN' => $data_head['DEPARTEMEN'],
	        'BIDANG_USAHA' => $data_head['BIDANG_USAHA'],
	        'KANTOR' => $data_head['KANTOR'],
	        'NAMA_GEDUNG_KANTOR' => $data_head['NAMA_GEDUNG_KANTOR'],
	        'NAMA_JALAN_KANTOR' => $data_head['NAMA_JALAN_KANTOR'],
	        'KOTA_KABUPATEN_KANTOR' => $data_head['KOTA_KABUPATEN_KANTOR'],
	        'KODEPOS_KANTOR' => $data_head['KODEPOS_KANTOR'],
	        'NEGARA_KANTOR' => $data_head['NEGARA_KANTOR'],
	        'NO_TLP_KANTOR' => $data_head['NO_TLP_KANTOR'].''.$data_head['NO_TLP_KANTOR1'],
	        'NO_EXT' => $data_head['NO_EXT'],
	        'PENDAPATAN_PERBULAN' => $data_head['PENDAPATAN_PERBULAN'],
	        'SUMBER_PENDAPATAN' => $data_head['SUMBER_PENDAPATAN'],
	        'SUMBER_PENDAPATAN_LAIN' => $data_head['SUMBER_PENDAPATAN_LAIN'],
	        'CREATEDDATE' => date("Y-m-d H:i:s")
	      )
	  );

	  $REK_ID = $wpdb->insert_id;
	  /* detail register */
	  $table_name = 'btn_registrasirekening_detail';
	  $statusdetail= $wpdb->insert(
	    $table_name,
	      array(
	        'REK_ID' => $REK_ID,
	        'TYPE_TABUNGAN' => $data_head['TYPE_ID'],
	        'KOTA_ID' => $data_detail['KOTA_ID'],
	        'CABANG_ID' => $data_detail['CABANG_ID'],
	        'TANGGAL' =>  $tanggal,
	        'WAKTU' => $data_detail['V_WAKTU']
	      )
	  );
	  if ($status > 0){
	    if ($statusdetail > 0){
	      echo "success";
	    }
	  } //End Success
	}

	add_action('wp_ajax_nopriv_btn_ajax_check_loan_registration', 'btn_ajax_check_loan_registration');
	add_action('wp_ajax_btn_ajax_check_loan_registration', 'btn_ajax_check_loan_registration');
	function btn_ajax_check_loan_registration(){
		global $wpdb;
		$data = null;
		foreach ($_POST['data'] as $head) {
			$data[$head['name']] = $head['value'];
		}

		//Conditionals Check
		$status = array('result' => 'true','age' => 'false', 'limit' =>'false','bank_finance' => 'false','income_ratio' => 'false');

		// Age
		$birthDate = $data['TANGGAL_LAHIR'];
		$birthDate = explode("/", $birthDate);
		$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
			? ((date("Y") - $birthDate[2]) - 1)
			: (date("Y") - $birthDate[2]));
		if($age>21 && $age<65){
			$status['age'] = 'true';
		}

		//Limit
		if( ( 0.33 * ( str_replace(",","",$data['MONTHLY_INCOME']) - str_replace(",","",$data['MONTHLY_FIXED_EXPENSES']) ) ) > str_replace(",","",$data['INSTALLMENT'])){
			$status['limit'] = 'true';
		}

		//Bank Finance
		if( str_replace(",","",$data['DEPOSIT']) >  (0.3* str_replace(",","",$data['LOAN_AMOUNT']) ) ){
			$status['bank_finance'] = 'true';
		}

		//Income Ratio
		if( ( str_replace(",","",$data['MONTHLY_INCOME'])*12*4.5 ) > str_replace(",","",$data['LOAN_AMOUNT'])  ){
			$status['income_ratio'] = 'true';
		}

		foreach($status as $key => $value){
				if($value == 'false'){
						$err_result[$key] = $value;
				}
		}

		if(isset($err_result)){ //rejected
				$err_result['result'] = 'false';
		}else{
				$err_result['result'] = 'true';
		}
		ob_clean();
		echo json_encode($err_result);
		wp_die();
	}


	add_action('wp_ajax_nopriv_btn_ajax_process_loan_registration', 'btn_ajax_process_loan_registration');
	add_action('wp_ajax_btn_ajax_process_loan_registration', 'btn_ajax_process_loan_registration');
	function btn_ajax_process_loan_registration(){
		global $wpdb;
		$data = null;
		foreach ($_POST['data']['head'] as $head) {
			$data[$head['name']] = $head['value'];
		}

		$data_detail = null;
		foreach ($_POST['data']['detail'] as $detail) {
			$data_detail[$detail['name']] = $detail['value'];
		}

		$table_name = 'btn_loanapplication';
		$status = $wpdb->insert(
			$table_name,
				array(
					'LOAN_ID'  => generate_ID($table_name),
					'NAME'  => $data['NAME'],
					'CITY'  => $data['KOTA_LAHIR'],
					'DOB'  => $data['TANGGAL_LAHIR'] ,
					'ADDRESS'  => $data['ADDRESS'] ,
					'PHONE'  => $data['PHONE'] ,
					'EMAIL'  => $data['EMAIL'] ,
					'KTP_NUMBER'  => $data['KTP_NUMBER'] ,
					'MARITAL_STATUS'  =>  $data['STATUS_KAWIN'],
					'SEX'  => $data['JENIS_KELAMIN'] ,
					'MONTHLY_INCOME'  => str_replace(",","",$data['MONTHLY_INCOME']) ,
					'MONTHLY_FIXED_EXPENSES'  => str_replace(",","",$data['MONTHLY_FIXED_EXPENSES']),
					'LOAN_AMOUNT'  =>  str_replace(",","",$data['LOAN_AMOUNT']),
					'DEPOSIT'  =>  str_replace(",","",$data['DEPOSIT']),
					'LOAN_TENURE'  =>  str_replace(",","",$data['LOAN_TENURE']),
					'LOAN_TYPE'  =>  $data['LOAN_TYPE'],
					'INTEREST'  =>  $data['INTEREST'],
					'INSTALLMENT'  =>  str_replace(",","",$data['INSTALLMENT']),
					'CREATED_DATE' => date("Y-m-d H:i:s")
				)
			);

			$LOAN_ID = $wpdb->insert_id;
		  /* detail register */
		  $table_name = 'btn_loanapplication_detail';
			$timestamp= strtotime($data_detail['V_TANGGAL']);
			$tanggal= date("Y-m-d", $timestamp);
		  $statusdetail= $wpdb->insert(
		    $table_name,
		      array(
		        'LOAN_ID' => $LOAN_ID,
		        'KOTA_ID' => $data_detail['KOTA_ID'],
		        'CABANG_ID' => $data_detail['CABANG_ID'],
		        'TANGGAL' =>  $tanggal,
		        'WAKTU' => $data_detail['V_WAKTU']
		      )
		  );

			$income = str_replace(",","",$data['MONTHLY_INCOME']);
			$expenses = str_replace(",","",$data['MONTHLY_FIXED_EXPENSES']);
			$amount = str_replace(",","",$data['LOAN_AMOUNT']);
			$deposit = str_replace(",","",$data['DEPOSIT']);
			$tenure = str_replace(",","",$data['LOAN_TENURE']);
			$installment = str_replace(",","",$data['INSTALLMENT']);

			// mssql_query
			$dbhandle = mssql_connect(MSSQL_HOST, MSSQL_USERNAME, MSSQL_PASSWORD) or die('Could not connect to the server!');
			$selected = mssql_select_db(MSSQL_DB, $dbhandle) or die("Couldn’t open database ".MSSQL_HOST);

			$result = mssql_query("EXEC dbo.SP_APPLY_LOAN @nama='".$data['NAME']."',@dob='".$data['TANGGAL_LAHIR']."',@address='".$data['ADDRESS']."', @notelp='".$data['PHONE']."', @email='".$data['EMAIL']."', @ktp='".$data['KTP_NUMBER']."',@maritalstatus='".$data['STATUS_KAWIN']."', @sex='".$data['JENIS_KELAMIN']."',@income='".$income."', @expense='".$expenses."', @tipepinj='".$data['LOAN_TYPE']."',@loan='".$amount."', @uangmuka='".$deposit."', @tenor='".$tenure."', @interest='".$data['INTEREST']."', @installment='".$installment."'", $dbhandle);

		if($status > 0){
			if($statusdetail > 0){
					ob_clean();
					echo "success";
					wp_die();
				}
		}
	}

	add_action( 'tf_create_options', 'mytheme_create_options' );
	function mytheme_create_options() {
		$btntitan = TitanFramework::getInstance( 'btn' );

		/**
		 * Create an admin panel & tabs
		 * You should put options here that do not change the look of your theme
		 */

		$adminPanel = $btntitan->createAdminPanel( array(
		    'name' => __( 'BTN VB Settings', 'btn' ),
		) );

		$generalTab = $adminPanel->createTab( array(
		    'name' => __( 'Umum', 'btn' ),
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Daftar Jenis Tabungan', 'btn' ),
		    'id' => 'jenis_tabungan',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );


		$generalTab->createOption( array(
		    'name' => __( 'Daftar Negara', 'btn' ),
		    'id' => 'negara',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Gelar Sebelum Nama', 'btn' ),
		    'id' => 'titleper',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Jenis Identitas', 'btn' ),
		    'id' => 'jenis_identitas',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Pendidikan Terakhir', 'btn' ),
		    'id' => 'pendidikan_terkhir',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Jenis Pekerjaan', 'btn' ),
		    'id' => 'jenis_pekerjaan',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Pendapatan per bulan', 'btn' ),
		    'id' => 'pendapatan_perbulan',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Sumber pendapatan (Bila tidak bekerja)', 'btn' ),
		    'id' => 'sumber_pendapatan',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Category Product', 'btn' ),
		    'id' => 'category_product',
		    'type' => 'code',
		    'desc' => __( 'pisahkan dengan enter', 'btn' ),
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'name' => __( 'Footer', 'btn' ),
		    'id' => 'footer',
		    'type' => 'text',
		    'lang' => 'text',
		) );

		$generalTab->createOption( array(
		    'type' => 'save',
		) );
	}

	function plugin_dir_theme_url($file){
		return get_template_directory_uri().str_replace(get_template_directory(),'',dirname($file)).'/';
	}

	function plugin_dir_theme($file,$curdir){
		return get_template_directory_uri().str_replace(get_template_directory(),'',dirname($curdir)).'/'.$file;
	}

  // Register Custom Taxonomy
	function city_branch() {
		$labels = array(
			'name'                       => _x( 'Kota dan Cabang', 'Taxonomy General Name', 'btn_langs' ),
			'singular_name'              => _x( 'Kota dan Cabang', 'Taxonomy Singular Name', 'btn_langs' ),
			'menu_name'                  => __( 'Kota dan Cabang', 'btn_langs' ),
			'all_items'                  => __( 'Semua Kota ', 'btn_langs' ),
			'parent_item'                => __( 'Kota/Cabang', 'btn_langs' ),
			'parent_item_colon'          => __( 'Kota/Cabang', 'btn_langs' ),
			'new_item_name'              => __( 'Kota/Cabang Baru', 'btn_langs' ),
			'add_new_item'               => __( 'Kota/Cabang Baru', 'btn_langs' ),
			'edit_item'                  => __( 'Edit Kota/Cabang', 'btn_langs' ),
			'update_item'                => __( 'Update Kota/Cabang', 'btn_langs' ),
			'view_item'                  => __( 'Lihat Kota/Cabang', 'btn_langs' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'btn_langs' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'btn_langs' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'btn_langs' ),
			'popular_items'              => __( 'Popular Items', 'btn_langs' ),
			'search_items'               => __( 'Search Items', 'btn_langs' ),
			'not_found'                  => __( 'Not Found', 'btn_langs' ),
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => false,
			'show_ui'                    => false,
			'show_admin_column'          => false,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'query_var'                  => true,
		);
		register_taxonomy( 'city_branch_key', array( null ), $args );
	}

	// Hook into the 'init' action
	add_action( 'init', 'city_branch', 0 );

	add_action('wp_ajax_nopriv_btn_ajax_process_CifRegistration', 'btn_ajax_process_CifRegistration');
	add_action('wp_ajax_btn_ajax_process_CifRegistration', 'btn_ajax_process_CifRegistration');
	function btn_ajax_process_CifRegistration() {
	  global $wpdb;

	  //data pribadi
	  if ( empty( $_POST['data']['pribadi'] ) ) {
			$ResdataPribadi = $_POST['pribadi'];
	  } else {
	  	$ResdataPribadi = $_POST['data']['pribadi'];
	  }
	  parse_str( urldecode( $ResdataPribadi ), $data_pribadi );
	  // upload file
	  // if ( ! empty( $_FILES['image_foto'] ) && ! empty( $_FILES['image_ttd'] ) ) {
	  // 	if ( !$_FILES['image_foto']['error'] && ! $_FILES['image_ttd']['error'] ) {
	  // 		if ( ! function_exists( 'wp_handle_upload' ) ) require_once( ABSPATH . 'wp-admin/includes/file.php' );

			//     $file_type	     = array( 'jpg', 'jpeg', 'png' );

			//     $file_name_foto  = $_FILES['image_foto']['name'];
			//     $file_size_foto	 = $_FILES['image_foto']['size'];
			//     $file_name_ttd   = $_FILES['image_ttd']['name'];
			//     $file_size_ttd	 = $_FILES['image_ttd']['size'];

			//     $explode_foto		 = explode( '.', $file_name_foto );
			//     $extensi_foto		 = strtolower( $explode_foto[count( $explode_foto ) - 1] );
			//     $explode_ttd		 = explode( '.', $file_name_ttd );
			//     $extensi_ttd		 = strtolower( $explode_ttd[count( $explode_ttd ) - 1] );

			//     $max_size 			 = 1024000;

		 //  		$upload_dir = wp_upload_dir();
		 //  		$filePath = $upload_dir['url'];

			// 		if ( ! in_array( $extensi_foto, $file_type ) || ! in_array( $extensi_ttd, $file_type ) ) {
			//         $return['success'] = false;
			//         $return['error'] = true;
			//         $return['msg'] = "Foto gagal diupload, file hanya dizinkan .jpg, .jpeg. dan .png";
			//         echo json_encode( $return );
			//         die();
			//     }
			//     if ( $file_size_foto > $max_size || $file_size_ttd > $max_size ) {
			//         $return['success'] = false;
			//         $return['error'] = true;
			//         $return['msg'] = "Foto gagal diupload, ukuran file maximal 1Mb";
			//         echo json_encode( $return );
			//         die();
			//     }

			//     $uploadedfileFoto = $_FILES['image_foto'];
			//     $uploadedfileTtd = $_FILES['image_ttd'];
			// 		$upload_overrides = array( 'test_form' => false );
			// 		// add_filter('upload_dir', 'my_upload_dir');
			// 		$movefileFoto = wp_handle_upload( $uploadedfileFoto, $upload_overrides );
			// 		$movefileTtd = wp_handle_upload( $uploadedfileTtd, $upload_overrides );
			// 		// remove_filter('upload_dir', 'my_upload_dir');
			// 		if ( !$movefileFoto || !$movefileTtd) {
			// 		    $return['success'] = false;
			//         $return['error'] = true;
			//         $return['msg'] = "Foto gagal diupload";
			//         echo json_encode($return);
			// 				die();
			// 		}

			// 		$url_foto = $movefileFoto['url'];
			// 		$url_ttd  = $movefileTtd['url'];
			// 	// }

			// 	// funcion my_upload_dir($upload) {
			// 	//   $upload['subdir'] = '/sub-dir-to-use' . $upload['subdir'];
			// 	//   $upload['path']   = $upload['basedir'] . $upload['subdir'];
			// 	//   $upload['url']    = $upload['baseurl'] . $upload['subdir'];
			// 	//   return $upload;
			// 	// }

			// }
	  // }

		// Form pembukaan rek simapanan
		if ( empty( $_POST['data']['rek_simpanan'] ) ) {
			$ResdataSimpanan = $_POST['rek_simpanan'];
		} else {
			$ResdataSimpanan = $_POST['data']['rek_simpanan'];
		}
		parse_str( urldecode( $ResdataSimpanan ), $data_rek_simpanan );
		$data_sertifikat = array(
			'denominal' => $data_rek_simpanan['denominal'],
			'lembar' => $data_rek_simpanan['lembar'],
		);
		$fitur = json_encode( $data_rek_simpanan['fitur'] );

		// Form sms banking
		if ( empty( $_POST['data']['atm_sms'] ) ) {
			$ResdataAtm = $_POST['atm_sms'];
		} else {
			$ResdataAtm = $_POST['data']['atm_sms'];
		}
		parse_str( urldecode( $ResdataAtm ), $data_atm_sms );
		$data_tabungan = array(
			'status_tabungan' => $data_atm_sms['status_tabungan'],
			'no_rek_tabungan' => $data_atm_sms['no_rek_tabungan'],
		);
	 	$data_giro = array(
			'status_giro' => $data_atm_sms['status_giro'],
			'no_rek_giro' => $data_atm_sms['no_rek_giro'],
		);
	 	$data_rek_transfer = array(
			'no_rek_tujuan' => $data_atm_sms['no_rek_tujuan'],
			'nama_pemilik_rek' => $data_atm_sms['nama_pemilik_rek'],
		);
	 	$data_rek_pemb = array(
			'nama_rekening' => $data_atm_sms['nama_rekening'],
			'no_pelanggan' => $data_atm_sms['no_pelanggan'],
		);

	  //Data Lembaga
	  if ( empty($_POST['data']['lembaga'] ) ) {
			$ResdataLembaga = $_POST['lembaga'];
	  } else {
	  	$ResdataLembaga = $_POST['data']['lembaga'];
	  }
	  parse_str( urldecode( $ResdataLembaga ), $get_array );
		$data_lembaga = $get_array;
		$data_pengurus = array(
			'nama_pengurus_1' => $get_array['nama_pengurus_1'],
			'alamat_pengurus_1' => $get_array['alamat_pengurus_1'],
			'jabatan_pengurus_1' => $get_array['jabatan_pengurus_1'],
			'npwp_pribadi_1' => $get_array['npwp_pribadi_1'],
			'ktp_pribadi_1' => $get_array['ktp_pribadi_1'],
			'dikeluarkan_ktp_1' => $get_array['dikeluarkan_ktp_1'],
			'ktp_kadaluwarsa_1' => $get_array['ktp_kadaluwarsa_1'],
			'tlp_rumah_1' => $get_array['tlp_rumah_1'],
			'no_hp_1' => $get_array['no_hp_1'],
		);
		$data_group = array(
			'nama_lembaga_group1' => $get_array['nama_lembaga_group1'],
			'alamat_lembaga_group1' => $get_array['alamat_lembaga_group1'],
			'bidang_usaha_group1' => $get_array['bidang_usaha_group1'],
			'no_telepon_group1' => $get_array['no_telepon_group1'],
			'no_npwp_group1' => $get_array['no_npwp_group1'],
		);

	  if ( $data_pribadi['jenis_cif'] == 'perorangan' ) {
		 	$jenis_cif = $data_pribadi['jenis_cif'];
			//Add New
		  //simpan data pribadi
		 	unset( $data_pribadi['rekeningBTN'] );
		 	unset( $data_pribadi['norekk'] );

		 //  $table_name = 'btn_data_pribadi';
		 //  $status = $wpdb->insert(
		 //    $table_name,
		 //      array(
		 //        'nama_sesuai_identitas' => strtoupper($data_pribadi['nama_lengkap']),
		 //        'nama_tanpa_gelar' => strtoupper($data_pribadi['nama_lengkap_tanpa_gelar']),
		 //        'gelar_sebelum_nama' => strtoupper($data_pribadi['gelar_sebelum_nama']),
		 //        'gelar_setelah_nama' => strtoupper($data_pribadi['gelar_setelah_nama']),
		 //        'nama_alias' => strtoupper($data_pribadi['nama_alias']),
		 //        'nama_wali' => strtoupper($data_pribadi['nama_wali']),
		 //        'alamat' => strtoupper($data_pribadi['alamat_pribadi']),
		 //        'rt' => $data_pribadi['rt_pribadi'],
		 //        'rw' => $data_pribadi['rw_pribadi'],
		 //        'kelurahan' => strtoupper($data_pribadi['kelurahan_pribadi']),
		 //        'kecamatan' => strtoupper($data_pribadi['kecamatan_pribadi']),
		 //        'kota' => strtoupper($data_pribadi['kota_pribadi']),
		 //        'kode_pos' => $data_pribadi['kodepos_pribadi'],
		 //        'propinsi' => strtoupper($data_pribadi['propinsi_pribadi']),
		 //        'status_alamat' => strtoupper($data_pribadi['status_alamat']),
		 //        'alamat_saat_ini' => strtoupper($data_pribadi['alama_saat_ini']),
		 //        'rt_saat_ini' => $data_pribadi['rt_saat_ini'],
		 //        'rw_saat_ini' => $data_pribadi['rw_saat_ini'],
		 //        'kelurahan_saat_ini' => strtoupper($data_pribadi['kelurahan_saat_ini']),
		 //        'kecamatan_saat_ini' => strtoupper($data_pribadi['kecamatan_saat_ini']),
		 //        'kota_saat_ini' => strtoupper($data_pribadi['kota_saat_ini']),
		 //        'propinsi_saat_ini' => strtoupper($data_pribadi['propinsi_saat_ini']),
		 //        'kodepos_saat_ini' => $data_pribadi['kodepos_saat_ini'],
		 //        'status_alamat_saat_ini'=> strtoupper($data_pribadi['status_alamat_saat_ini']),
		 //        'tahun_lama_tinggal'=> $data_pribadi['tahun_lama_tinggal'],
		 //        'bulan_lama_tinggal'=> $data_pribadi['bulan_lama_tinggal'],
		 //        'no_tlp_1' => $data_pribadi['no_telepon1'],
		 //        'no_tlp_2' => $data_pribadi['no_telepon2'],
		 //        'ponsel' => $data_pribadi['ponsel'],
		 //        'email' => $data_pribadi['email'],
		 //        'tempat_lahir' => strtoupper($data_pribadi['tempat_lahir']),
		 //        'tgl_lahir'=> $data_pribadi['tanggal_lahir'],
		 //        'warganegara' => strtoupper($data_pribadi['kewarganegaraan']),
		 //        'negara_asal' => strtoupper($data_pribadi['negara_asal']),
		 //        'jenis_kelamin' => strtoupper($data_pribadi['jenis_kelamin']),
		 //        'status_penduduk' => strtoupper($data_pribadi['status_penduduk']),
		 //        'id_pengenal' => strtoupper($data_pribadi['tanda_pengenal']),
		 //        'no_pengenal' => $data_pribadi['no_tanda_pengenal'],
		 //        'diterbitkan_pengenal' => strtoupper($data_pribadi['di_terbitkan']),
		 //        'masa_berlaku_pengenal' => $data_pribadi['berlaku_hingga'], //atau seumur_hidup
		 //        'id_pengenal_tambahan' => strtoupper($data_pribadi['tanda_pengenal_tambahan']),
		 //        'no_pengenal_tambahan' => $data_pribadi['no_tanda_pengenal_tambahan'],
		 //        'diterbitkan_pengenal_tambahan' => strtoupper($data_pribadi['di_terbitkan_tambahan']),
		 //        'agama' => strtoupper($data_pribadi['agama']),
		 //        'agama_lainnya' => strtoupper($data_pribadi['agama_lainnya']),
		 //        'status_kawin' => strtoupper($data_pribadi['status_perkawinan']),
		 //        'jumlah_anak' => $data_pribadi['jumlah_anak'],
		 //        'jumlah_tanggungan' => $data_pribadi['jumlah_tanggungan'],
		 //        'pendidikan' => strtoupper($data_pribadi['pendidikan']),
		 //        'nama_gadis_ibu_kandung' => strtoupper($data_pribadi['nama_gadis_ibu_kandung']),
		 //        'nama_lengkap_relasi' => strtoupper($data_pribadi['nama_lengkap_relasi']),
		 //        'alamat_relasi' => strtoupper($data_pribadi['alamat_relasi']),
		 //        'no_tlp_relasi' => $data_pribadi['telepon_relasi'],
		 //        'no_hp_relasi' => $data_pribadi['hp_relasi'],
		 //        'hubungan_nasabah' => strtoupper($data_pribadi['hubungan_nasabah']),
		 //        'bidang_usaha' => strtoupper($data_pribadi['bidang_usaha']),
		 //        'bidang_usaha_lainnya' => strtoupper($data_pribadi['bidang_usaha_lainnya']),
		 //        'jenis_pekerjaan' => strtoupper($data_pribadi['jenis_pekerjaan']), // atau jenis_pekerjaan_lainnya
		 //        'jenis_pekerjaan_lainnya' => strtoupper($data_pribadi['jenis_pekerjaan_lainnya']),
		 //        'jabatan' => strtoupper($data_pribadi['jabatan']),
		 //        'nama_perusahaan' => strtoupper($data_pribadi['nama_perusahaan']),
		 //        'alamat_perusahaan' => strtoupper($data_pribadi['alamat_perusahaan']),
		 //        'rt_perusahaan' => $data_pribadi['rt_perusahaan'],
		 //        'rw_perusahaan' => $data_pribadi['rw_perusahaan'],
		 //        'kelurahan_perusahaan' => strtoupper($data_pribadi['kelurahan_perusahaan']),
		 //        'kecamatan_perusahaan' => strtoupper($data_pribadi['kecamatan_perusahaan']),
		 //        'kota_perusahaan' => strtoupper($data_pribadi['kota_perusahaan']),
		 //        'kodepos_perusahaan' => $data_pribadi['kodepos_perusahaan'],
		 //        'provinsi_perusahaan' => strtoupper($data_pribadi['propinsi_perusahaan']),
		 //        'tlp_perusahaan' => $data_pribadi['no_telepon_perusahaan'],
		 //        'fax_perusahaan' => $data_pribadi['fax_perusahaan'],
		 //        'email_perusahaan' => $data_pribadi['email_perusahaan'],
		 //        'website_perusahaan' => $data_pribadi['website_perusahaan'],
		 //        'penghasilan_pemohon' => $data_pribadi['penghasilan'], // atau penghasilan_lainnya
		 //        'penghasilan_pemohon_lainnya' => $data_pribadi['penghasilan_lainnya'],
		 //        'penghasilan_tambahan' => $data_pribadi['penghasilan_tambahan'], //atau hasil_tambahan_lainnya
		 //        'penghasilan_tambahan_lainnya' => $data_pribadi['hasil_tambahan_lainnya'],
		 //        'nama_penghasilan_tambahan' => strtoupper($data_pribadi['nama_penghasilan_tambahan']),
		 //        'photo' => '',
		 //        'tanda_tangan' => '',
		 //        'created' => date("Y-m-d H:i:s")
		 //      )
		 //  );
			// $id_cif_perorangan = $wpdb->insert_id;
		}

		if ( $data_lembaga['jenis_cif'] == 'lembaga' ) {
			// Save Data Lembaga
			$jenis_cif = $data_lembaga['jenis_cif'];
			// $table_name = 'btn_data_lembaga';
			// $status = $wpdb->insert(
			// 	$table_name,
			// 		array(
			// 			'nama_lembaga' =>strtoupper($data_lembaga['nama_lembaga']),
			// 		  'bidang_usaha' =>$data_lembaga['bidang_usaha'], //atau bidang_usaha_lainnya
			// 		  'bidang_usaha_lainnya' =>$data_lembaga['bidang_usaha_lainnya'],
			// 		  'alamat' =>$data_lembaga['alamat_lembaga'],
			// 		  'rt' =>$data_lembaga['rt_lembaga'],
			// 		  'rw' =>$data_lembaga['rw_lembaga'],
			// 		  'kelurahan' =>$data_lembaga['kelurahan_lembaga'],
			// 		  'kecamatan' =>$data_lembaga['kecamatan_lembaga'],
			// 		  'kota' =>$data_lembaga['kota_lembaga'],
			// 		  'provinsi' =>$data_lembaga['propinsi'],
			// 		  'kode_pos' =>$data_lembaga['kodepos_lembaga'],
			// 		  'no_tlp' =>$data_lembaga['no_tlp_lembaga'],
			// 		  'no_fax' =>$data_lembaga['no_fax_lembaga'],
			// 		  'email' =>$data_lembaga['email_lembaga'],
			// 		  'website' =>$data_lembaga['website_lembaga'],
			// 		  'no_npwp' =>$data_lembaga['no_npwp'],
			// 		  'no_anggaran_dasar' =>$data_lembaga['no_anggaran_dasar'],
			// 		  'no_akta_pendirian' =>$data_lembaga['no_akta_pendirian'],
			// 		  'tanggal_akta_pendirian' =>$data_lembaga['tanggal_akta_pendirian'],
			// 		  'diterbitkan_akta_pendirian' =>$data_lembaga['akta_diterbitkan'],
			// 		  'notaris_akta_pendirian' =>$data_lembaga['nama_notaris_akta_pendirian'],
			// 		  'no_akta_perubahan' =>$data_lembaga['no_akta_perubahan'],
			// 		  'tanggal_akta_perubahan' =>$data_lembaga['tanggal_akta_perubahan'],
			// 		  'diterbitkan_akta_perubahan' =>$data_lembaga['akta_perubahan_diterbitkan'],
			// 		  'notaris_akta_perubahan' =>$data_lembaga['nama_notaris_akta_perubahan'],
			// 		  'no_siup' =>$data_lembaga['no_siup'],
			// 		  'tanggal_siup' =>$data_lembaga['tanggal_siup'],
			// 		  'diterbitkan_siup' =>$data_lembaga['siup_diterbitkan'],
			// 		  'siup_masa_berlaku' =>$data_lembaga['siup_berlaku'],
			// 		  'no_tdp' =>$data_lembaga['no_tdp'],
			// 		  'tanggal_tdp' =>$data_lembaga['tanggal_tdp'],
			// 		  'diterbitkan_tdp' =>$data_lembaga['tdp_diterbitkan'],
			// 		  'tdp_masa_berlaku' =>$data_lembaga['tdp_berlaku'],
			// 		  'no_situ' =>$data_lembaga['no_situ'],
			// 		  'tanggal_situ' =>$data_lembaga['tanggal_situ'],
			// 		  'diterbitkan_situ' =>$data_lembaga['situ_diterbitkan'],
			// 		  'situ_masa_berlaku' =>$data_lembaga['situ_berlaku']
			// 		)
			// 	);
			// 	$id_data_lembaga = $wpdb->insert_id;

			// 	//lembaga group usaha
			// 	foreach ($data_group['nama_lembaga_group1'] as $key => $v_group) {
			// 		$table_name = 'btn_group_usaha_lembaga';
			// 	  $statusdetail= $wpdb->insert(
			// 	    $table_name,
			// 	      array(
			// 	      'id_data_lembaga'=>$id_data_lembaga,
			// 				'nama_lembaga'=>strtoupper($v_group),
			// 				'alamat'=>$data_group['alamat_lembaga_group1'][$key],
			// 				'bidang_usaha'=>$data_group['bidang_usaha_group1'][$key],
			// 				'no_tlp'=>$data_group['no_telepon_group1'][$key],
			// 				'no_npwp'=>$data_group['no_npwp_group1'][$key]
			// 	      )
			// 	  );
			// 	}

			//   //lembaga pengurus
			//   foreach ($data_pengurus['nama_pengurus_1'] as $key => $v) {
			// 	  $table_name = 'btn_data_pengurus_lembaga';
			// 	  $statusdetail= $wpdb->insert(
			// 	    $table_name,
			// 	      array(
			// 				'id_data_lembaga'=>$id_data_lembaga,
			// 				'nama'=>strtoupper($v),
			// 				'alamat'=>$data_pengurus['alamat_pengurus_1'][$key],
			// 				'jabatan'=>$data_pengurus['jabatan_pengurus_1'][$key],
			// 				'no_npwp'=>$data_pengurus['npwp_pribadi_1'][$key],
			// 				'no_ktp'=>$data_pengurus['ktp_pribadi_1'][$key],
			// 				'dikeluarkan_di'=>$data_pengurus['dikeluarkan_ktp_1'][$key],
			// 				'tgl_kadaluwarsa'=>$data_pengurus['ktp_kadaluwarsa_1'][$key],
			// 				'tlp_rumah'=>$data_pengurus['tlp_rumah_1'][$key],
			// 				'no_hp'=>$data_pengurus['no_hp_1'][$key]
			// 	      )
			// 	  );
			// 	}
			// }

			//save form simpanan
			//  $id_cif = $wpdb->insert_id;
			//  $table_name = 'btn_form_simpanan';
			//  $statusdetail= $wpdb->insert(
			//    $table_name,
			//      array(
			//      	'id_produk' => $data_rek_simpanan['id_produk'],
			// 		  'menghendaki_jasa_tabungan' => strtoupper($data_rek_simpanan['jasa_tabungan']),
			// 		  'tahun_berangkat' => $data_rek_simpanan['tahun_keberangkatan'],
			// 		  'wilayah_berangkat' => strtoupper($data_rek_simpanan['wilayah_keberangkatan']),
			// 			  'alasan_penggantian_kartu' => strtoupper($data_rek_simpanan['alasan_penggantian_kartu']),
			// 			  'alasan_penggantian_kartu_lainnya' => strtoupper($data_rek_simpanan['alasan_penggantian_kartu_lainnya']),
			// 		  'no_cif' => $data_rek_simpanan['no_cif_nasabah'],
			// 		  'nama_lengkap' => strtoupper($data_rek_simpanan['nama_lengkap_nasabah']),
			// 		  'no_rekening' => $data_rek_simpanan['no_rekening_nasabah'],
			// 		  'sumber_dana' => strtoupper($data_rek_simpanan['sumber_dana']), //atau sumber_dana_lainnya
			// 		  'sumber_dana_lainnya' => strtoupper($data_rek_simpanan['sumber_dana_lainnya']),
			// 		  'sumber_dana_tambahan' => strtoupper($data_rek_simpanan['sumber_dana_tambahan']), //atau sumber_dana_tambahan_lainnya
			// 		  'sumber_dana_tambahan_lainnya' => strtoupper($data_rek_simpanan['sumber_dana_tambahan_lainnya']),
			// 		  'jenis_setoran' => strtoupper($data_rek_simpanan['jenis_setoran']), //atau jenis_setoran_lainnya
			// 		  'jenis_setoran_lainnya' => strtoupper($data_rek_simpanan['jenis_setoran_lainnya']),
			// 		  'tujuan_buka_rekening' => strtoupper($data_rek_simpanan['tujuan_pembukaan_rekening']), //atau tujuan_buka_rek_lainnya
			// 		  'tujuan_buka_rekening_lainnya' => strtoupper($data_rek_simpanan['tujuan_buka_rek_lainnya']),
			// 		  'alasan_buka_rekening' => strtoupper($data_rek_simpanan['alasan_membuka_rekening_btn']), //atau alasan_membuka_rekening_lainnya
			// 		  'alasan_buka_rekening_lainnya' => strtoupper($data_rek_simpanan['alasan_membuka_rekening_lainnya']),
			// 		  'fitur' => $fitur,
			// 		  'nama_pada_kartu' => strtoupper($data_rek_simpanan['nama_pada_kartu']),
			// 		  'jumlah_nominal' => $data_rek_simpanan['jumlah_nominal_deposito'],
			// 		  'terbilang' => strtoupper($data_rek_simpanan['terbilang']),
			// 		  'mata_uang' => strtoupper($data_rek_simpanan['mata_uang']),
			// 		  'jangka_waktu' => $data_rek_simpanan['jangka_waktu'], //atau jangka_waktu_hari
			// 		  'jangka_waktu_hari' => $data_rek_simpanan['jangka_waktu_hari'],
			// 		  'suku_bunga' => $data_rek_simpanan['suku_bunga'],
			// 		  'perpanjangan' => strtoupper($data_rek_simpanan['perpanjangan']),
			// 		  'cara_pembayaran_bunga' => strtoupper($data_rek_simpanan['cara_pembayaran_bunga']),
			// 		  'pemindahbukuan' => $data_rek_simpanan['pemindahbukuan'],
			// 		  'pemindahbukuan_ke_rek' => $data_rek_simpanan['pemindahbukuan_ke_rek']
			//      )
			//  );
			// $id_form_simpanan = $wpdb->insert_id;

			// foreach ($data_sertifikat['denominal'] as $key => $v_denominal) {
			//   //save form simpanan khusu sertifikat deposito
			//   $table_name = 'btn_sertifikat_deposito';
			//   $statusdetail= $wpdb->insert(
			//     $table_name,
			//       array(
			//       	'id_form_simpanan' => $id_form_simpanan,
			// 			  'denominal' => $v_denominal,
			// 			  'lembar' => $data_sertifikat['lembar'][$key],
			// 			)
			//   );
			// }

			// if (empty($_POST['data']['type'])) {
			// 	$type = $_POST['type'];
			// } else {
			// 	$type = $_POST['data']['type'];
			// }

			// if ($type == 1) {
			// 	save form atm dan sms banking
			// 	$table_name = 'btn_form_atm_sms';
			// 	$statusdetail= $wpdb->insert(
			// 	$table_name,
			//     array(
				// 	  'kota' => $data_atm_sms['kota_id'],
				// 	  'cabang' => $data_atm_sms['cabang_aplikasi'],
				// 	  'tanggal' => $data_atm_sms['tanggal_aplikasi'],
				// 	  'nama_lengkap' => strtoupper($data_atm_sms['nama_lengkap_aplikasi']),
				// 	  'tempat_lahir' => $data_atm_sms['tempat_lahir_aplikasi'],
				// 	  'tanggal_lahir' => $data_atm_sms['tanggal_lahir_aplikasi'],
				// 	  'nama_gadis_ibu_kandung' => strtoupper($data_atm_sms['nama_gadis_ibu_kandung_aplikasi']),
				// 	  'alamat_lengkap' => $data_atm_sms['alamat_lengkap_aplikasi'],
				// 	  'no_tlp_rumah' => $data_atm_sms['no_tlp_rumah_aplikasi'],
				// 	  'no_tlp_kantor' => $data_atm_sms['no_tlp_kantor_aplikasi'],
				// 	  'no_hp' => $data_atm_sms['no_hp_aplikasi'],
				// 	  'no_kartu_btn' => $data_atm_sms['no_kartu_aplikasi'],
				// 	  'no_cif' => $data_atm_sms['no_cif_aplikasi'],
				// 	  'kartu_btn' => $data_atm_sms['kartu_btn'],
				// 	  'kartu_baru' => $data_atm_sms['kartu_baru'],
				// 	  'nama_pada_kartu' => $data_atm_sms['nama_pada_kartu'],
				// 	  'penggantian_kartu' => $data_atm_sms['penggantian_kartu'],
				// 	  'alasan_penggantian_kartu' => $data_atm_sms['alasan_penggantian_kartu'], //atau alasan_penggantian_kartu_lainnya
				// 	  'alasan_penggantian_kartu_lain' => $data_atm_sms['alasan_penggantian_kartu_lainnya'],
				// 	  'jenis_kartu' => $data_atm_sms['jenis_kartu'],
				// 	  'status_kartu_instan' => $data_atm_sms['status_kartu_instan'],
				// 	  'update_data' => $data_atm_sms['update_data'],
				// 	  'sms_banking' => $data_atm_sms['sms_banking'],
				// 	  'daftar_rek_tujuan_transfer' => $data_atm_sms['daftar_rek_tujuan_transfer'],
				// 	  'daftar_rek_pembayaran' => $data_atm_sms['daftar_no_rek_pembayaran'],
				// 	  'sms_alert' => $data_atm_sms['sms_alert'],
				// 	  'pendebetan_lebih_dari' => $data_atm_sms['pendebetan_lebih'],
				// 	  'pengkreditan_lebih_dari' => $data_atm_sms['pengkreditan_lebih_dari'],
				// 	  'saldo_kurang_dari' => $data_atm_sms['saldo_kurang_dari'],
				// 	  'no_rek_pendebitan' => $data_atm_sms['no_rek_pendebitan'],
				// 	  'no_rek_pengkreditan' => $data_atm_sms['no_rek_pengkreditan'],
				// 	  'no_rek_saldo' => $data_atm_sms['no_rek_saldo']
				// 	)
				// );

				//save to table btn_update_data_giro
				// $id_form_atm_sms = $wpdb->insert_id;
				// foreach ($data_giro['status_giro'] as $key => $v_giro) {
				// 	$table_name = 'btn_update_data_giro';
				//   $statusdetail= $wpdb->insert(
				//    $table_name,
				//      array(
				// 		  'id_form_atm_sms' => $id_form_atm_sms,
				// 		  'status_giro' => $v_giro,
				// 		  'nomor_rekening' => $data_giro['no_rek_giro'][$key]
				// 		)
				// 	);
				// }

				//  foreach ($data_tabungan['status_tabungan'] as $key => $v_tabungan) {
				// 	$table_name = 'btn_update_data_tabungan';
				//   $statusdetail= $wpdb->insert(
				//     $table_name,
				//       array(
				// 			  'id_form_atm_sms' => $id_form_atm_sms,
				// 			  'status_tabungan' => $v_tabungan,
				// 			  'no_rekening' => $data_tabungan['no_rek_tabungan'][$key]
				// 			)
				// 	);
				// }

				// foreach ($data_rek_pemb['nama_rekening'] as $key => $v_rek_pemb) {
				// 	$table_name = 'btn_daftar_rek_pembayaran';
				//   $statusdetail= $wpdb->insert(
				//     $table_name,
				//       array(
				// 			  'id_form_atm_sms' => $id_form_atm_sms,
				// 			  'nama_rekening' => $v_rek_pemb,
				// 			  'no_pelanggan' => $data_rek_pemb['no_pelanggan'][$key]
				// 			)
				// 	);
				// }

				// foreach ($data_rek_transfer['no_rek_tujuan'] as $key => $v_rek_transfer) {
				// 	$table_name = 'btn_daftar_rek_sms_banking';
				//   $statusdetail= $wpdb->insert(
				//     $table_name,
				//       array(
				// 			  'id_form_atm_sms' => $id_form_atm_sms,
				// 			  'no_rek_tujuan' => $v_rek_transfer,
				// 			  'nama_pemilik_rek' => strtoupper($data_rek_transfer['nama_pemilik_rek'][$key])
				// 			)
				// 	);
				// }
		}

		$data = array(
			'app_code' =>  replaceSymbol($data_pribadi['app_code']),
			'datetime_create' => replaceSymbol(date("YmdHis")),
			'no_registrasi' => replaceSymbol(generateNoReg()),
			'nama_sesuai_identitas' => replaceSymbol(strtoupper($data_pribadi['nama_sesuai_identitas'])),
			'nama_tanpa_gelar' => replaceSymbol(strtoupper($data_pribadi['nama_tanpa_gelar'])),
			'gelar_sebelum_nama' => replaceSymbol($data_pribadi['gelar_sebelum_nama']),
			'gelar_setelah_nama' => replaceSymbol($data_pribadi['gelar_setelah_nama']),
			'nama_alias' => replaceSymbol($data_pribadi['nama_alias']),
			'nama_wali' => replaceSymbol($data_pribadi['nama_wali']),
			'alamat' => replaceSymbol($data_pribadi['alamat']),
			'rt' => replaceSymbol($data_pribadi['rt']),
			'rw' => replaceSymbol($data_pribadi['rw']),
			'kelurahan' => replaceSymbol($data_pribadi['kelurahan']),
			'kecamatan' => replaceSymbol($data_pribadi['kecamatan']),
			'kota' => replaceSymbol($data_pribadi['kota']),
			'propinsi' => replaceSymbol($data_pribadi['propinsi']),
			'kode_pos' => replaceSymbol($data_pribadi['kode_pos']),
			'status_alamat' => replaceSymbol($data_pribadi['status_alamat']),
			'alamat_saat_ini' => replaceSymbol($data_pribadi['alamat_saat_ini']),
			'rt_saat_ini' => replaceSymbol($data_pribadi['rt_saat_ini']),
			'rw_saat_ini' => replaceSymbol($data_pribadi['rw_saat_ini']),
			'kelurahan_saat_ini' => replaceSymbol($data_pribadi['kelurahan_saat_ini']),
			'kecamatan_saat_ini' => replaceSymbol($data_pribadi['kecamatan_saat_ini']),
			'kota_saat_ini' => replaceSymbol($data_pribadi['kota_saat_ini']),
			'propinsi_saat_ini' => replaceSymbol($data_pribadi['propinsi_saat_ini']),
			'kodepos_saat_ini' => replaceSymbol($data_pribadi['kodepos_saat_ini']),
			'status_alamat_saat_ini' => replaceSymbol($data_pribadi['status_alamat_saat_ini']),
			'tahun_lama_tinggal' => replaceSymbol($data_pribadi['tahun_lama_tinggal']),
			'bulan_lama_tinggal' => replaceSymbol($data_pribadi['bulan_lama_tinggal']),
			'hp_no' => replaceSymbol($data_pribadi['hp_no']),
			'telp_number' => replaceSymbol($data_pribadi['telp_number']),
			'ponsel' => replaceSymbol($data_pribadi['ponsel']),
			'email' => replaceSymbol($data_pribadi['email']),
			'tempat_lahir' => replaceSymbol($data_pribadi['tempat_lahir']),
			'tgl_lahir' => replaceSymbol($data_pribadi['tgl_lahir']),
			'warganegara' => replaceSymbol(strtoupper($data_pribadi['warganegara'])),
			'negara_asal' => replaceSymbol($data_pribadi['negara_asal']),
			'jenis_kelamin' => replaceSymbol($data_pribadi['jenis_kelamin']),
			'status_penduduk' => replaceSymbol($data_pribadi['status_penduduk']),
			'id_pengenal' => replaceSymbol($data_pribadi['id_pengenal']),
			'no_pengenal' => replaceSymbol($data_pribadi['no_pengenal']),
			'diterbitkan_pengenal' => replaceSymbol($data_pribadi['diterbitkan_pengenal']),
			'masa_berlaku_pengenal' => replaceSymbol($data_pribadi['masa_berlaku_pengenal']),
			'no_pengenal_seumur_hidup' => replaceSymbol($data_pribadi['no_pengenal_seumur_hidup']),
			'nomor_npwp' => replaceSymbol($data_pribadi['nomor_npwp']),
			'diterbitkan_npwp' => replaceSymbol($data_pribadi['diterbitkan_npwp']),
			'id_pengenal_tambahan' => replaceSymbol($data_pribadi['id_pengenal_tambahan']),
			'no_pengenal_tambahan' => replaceSymbol($data_pribadi['no_pengenal_tambahan']),
			'diterbitkan_pengenal_tambahan' => replaceSymbol($data_pribadi['diterbitkan_pengenal_tambahan']),
			'agama' => replaceSymbol($data_pribadi['agama']),
			'agama_lainnya' => replaceSymbol($data_pribadi['agama_lainnya']),
			'status_kawin' => replaceSymbol($data_pribadi['status_kawin']),
			'jumlah_anak' => replaceSymbol($data_pribadi['jumlah_anak']),
			'jumlah_tanggungan' => replaceSymbol($data_pribadi['jumlah_tanggungan']),
			'pendidikan' => replaceSymbol($data_pribadi['pendidikan']),
			'bid_akademik' => replaceSymbol($data_pribadi['bid_akademik']),
			'nama_gadis_ibu_kandung' => replaceSymbol($data_pribadi['nama_gadis_ibu_kandung']),
			'nama_lengkap_relasi' => replaceSymbol($data_pribadi['nama_lengkap_relasi']),
			'alamat_relasi' => replaceSymbol($data_pribadi['alamat_relasi']),
			'no_tlp_relasi' => replaceSymbol($data_pribadi['no_tlp_relasi']),
			'no_hp_relasi' => replaceSymbol($data_pribadi['no_hp_relasi']),
			// 'kode_hubungan_nasabah' => replaceSymbol($data_pribadi['kode_hubungan_nasabah']),
			'kode_hubungan_nasabah' => '97',
			'hubungan_nasabah' => replaceSymbol($data_pribadi['hubungan_nasabah']),
			// 'kode_bidang_usaha' => replaceSymbol($data_pribadi['kode_bidang_usaha']),
			'kode_bidang_usaha' => '7',
			'bidang_usaha' => replaceSymbol($data_pribadi['bidang_usaha']),
			// 'kode_bidang_usaha_lainnya' => replaceSymbol($data_pribadi['kode_bidang_usaha_lainnya']),
			'kode_bidang_usaha_lainnya' => '7',
			'bidang_usaha_lainnya' => replaceSymbol($data_pribadi['bidang_usaha_lainnya']),
			// 'kode_jenis_pekerjaan' => replaceSymbol($data_pribadi['kode_jenis_pekerjaan']),
			'kode_jenis_pekerjaan' => '87',
			'jenis_pekerjaan' => replaceSymbol($data_pribadi['jenis_pekerjaan']),
			// 'kd_jenis_pekerjaan_lainnya' => replaceSymbol($data_pribadi['kd_jenis_pekerjaan_lainnya']),
			'kd_jenis_pekerjaan_lainnya' => '89',
			'jenis_pekerjaan_lainnya' => replaceSymbol($data_pribadi['jenis_pekerjaan_lainnya']),
			// 'kode_jabatan' => replaceSymbol($data_pribadi['kode_jabatan']),
			'kode_jabatan' => '89',
			'jabatan' => replaceSymbol($data_pribadi['jabatan']),
			'nama_perusahaan' => replaceSymbol($data_pribadi['nama_perusahaan']),
			'alamat_perusahaan' => replaceSymbol($data_pribadi['alamat_perusahaan']),
			'rt_perusahaan' => replaceSymbol($data_pribadi['rt_perusahaan']),
			'rw_perusahaan' => replaceSymbol($data_pribadi['rw_perusahaan']),
			'kelurahan_perusahaan' => replaceSymbol($data_pribadi['kelurahan_perusahaan']),
			'kecamatan_perusahaan' => replaceSymbol($data_pribadi['kecamatan_perusahaan']),
			'kota_perusahaan' => replaceSymbol($data_pribadi['kota_perusahaan']),
			'kodepos_perusahaan' => replaceSymbol($data_pribadi['kodepos_perusahaan']),
			'provinsi_perusahaan' => replaceSymbol($data_pribadi['provinsi_perusahaan']),
			'tlp_perusahaan' => replaceSymbol($data_pribadi['tlp_perusahaan']),
			'fax_perusahaan' => replaceSymbol($data_pribadi['fax_perusahaan']),
			'email_perusahaan' => replaceSymbol($data_pribadi['email_perusahaan']),
			'website_perusahaan' => replaceSymbol($data_pribadi['website_perusahaan']),
			'penghasilan_pemohon' => replaceSymbol($data_pribadi['penghasilan_pemohon']),
			'penghasilan_pemohon_lainnya' => replaceSymbol($data_pribadi['penghasilan_pemohon_lainnya']),
			'penghasilan_tambahan' => replaceSymbol($data_pribadi['penghasilan_tambahan']),
			'penghasilan_tambahan_lainnya' => replaceSymbol($data_pribadi['penghasilan_tambahan_lainnya']),
			'nama_penghasilan_tambahan' => replaceSymbol($data_pribadi['nama_penghasilan_tambahan']),
			'photo' => replaceSymbol($data_pribadi['photo']),
			'tanda_tangan' => replaceSymbol($data_pribadi['tanda_tangan']),
			'SUMBER_DANA' => replaceSymbol($data_rek_simpanan['SUMBER_DANA']),
			'SUMBER_DANA_LAIN' => replaceSymbol($data_rek_simpanan['SUMBER_DANA_LAIN']),
			'SUMBER_DANA_TBHN' => replaceSymbol($data_rek_simpanan['SUMBER_DANA_TBHN']),
			'SUMBER_DANA_TBHN_LAIN' => replaceSymbol($data_rek_simpanan['SUMBER_DANA_TBHN_LAIN']),
			'JENIS_SETORAN' => replaceSymbol($data_rek_simpanan['JENIS_SETORAN']),
			'JENIS_SETORAN_LAIN' => replaceSymbol($data_rek_simpanan['JENIS_SETORAN_LAIN']),
			'TUJUAN_PEMBUKAAN' => replaceSymbol($data_rek_simpanan['TUJUAN_PEMBUKAAN']),
			'TUJUAN_PEMBUKAAN_LAIN' => replaceSymbol($data_rek_simpanan['TUJUAN_PEMBUKAAN_LAIN']),
			'ALASAN_PEMBUKAAN' => replaceSymbol($data_rek_simpanan['ALASAN_PEMBUKAAN'])
		);

		// print_r( $data['no_registrasi'] . "\n" );
		// print_r( $data );
		
		$params = $data;
		$WSDL_URI = WP_FULL_URL."/digital_banking/service.asmx?wsdl";
		
		$opts = array(
			'http' => array(
				'user_agent' => 'PHPSoapClient'
			)
		);

		$context = stream_context_create( $opts );
		$options = array(
			'soap_version' => SOAP_1_2,
			'exceptions' => true,
			'stream_context' => $context,
			'trace' => 1,
			'cache_wsdl' => WSDL_CACHE_NONE
		);

		try {
			$client = new SoapClient( $WSDL_URI, $options );
			$send = $client->CustomerSubmit( $params );
			// $send = new stdClass();
			// $send->CustomerSubmitResult = new stdClass();
			// $send->CustomerSubmitResult->status = new stdClass();
			// $send->CustomerSubmitResult->status->Status = new stdClass();
			// $send->CustomerSubmitResult->status->Status->isError = 'true'; // give the string value false or true
			// $send->CustomerSubmitResult->status->Status->errorCode = '00';
			// $send->CustomerSubmitResult->status->Status->errorDescription = 'Sukses';
			$isError = $send->CustomerSubmitResult->status->Status->isError;
			// print_r( $send );
			if ( $isError == 'false' ) {
				// Save to table
				$table_name = 'btn_web_service';
				$statusCIF = $wpdb->insert( $table_name, array( 'no_registrasi' => generateNoReg() ) );
			}
		} catch ( Exception $fault ) {
			$send = 0;
			// trigger_error( "SOAP Fault: (faultcode: {$fault->faultcode}, faultstring: {$fault->faultstring})", E_USER_ERROR );
		}

		// ob_clean();
		if ( ( $send > 0 ) && ( $isError == 'false' ) && ( $statusCIF > 0 ) ) {
			$return['success'] = true;
			$return['error'] = false;
			$return['msg'] = "Nomor referensi anda adalah ".$data['no_registrasi'].". Mohon catat nomor referensi ini untuk dibawa ke customer service BTN terdekat.";
			echo json_encode( $return );
			die();
		} else {
			$return['success'] = false;
			$return['error'] = true;
			$return['msg'] = "Mohon maaf registrasi Anda belum berhasil. Silahkan untuk coba beberapa saat lagi.";
			echo json_encode( $return );
			die();
		} //End Success
		wp_die();

		//save to cif relation
		// $table_name = 'btn_cif_relation';
		//  $statusCIF = $wpdb->insert(
		//  	$table_name,
		//      array(
		// 		  'id_data_pribadi' => $id_cif_perorangan,
		// 		  'id_data_lembaga' => $id_data_lembaga,
		// 		  'jenis_cif' => $jenis_cif,
		// 		  'id_form_simpanan' => $id_form_simpanan,
		// 		  'id_form_atm_sms' => $id_form_atm_sms,
		// 		  'reg_id' => generate_ID2()
		// 		)
		// );
	}

	add_action('wp_ajax_nopriv_btn_ajax_process_atm_sms', 'btn_ajax_process_atm_sms');
	add_action('wp_ajax_btn_ajax_process_atm_sms', 'btn_ajax_process_atm_sms');
	function btn_ajax_process_atm_sms() {
		global $wpdb;

		$Resdata = $_POST['data']['atm_sms'];
		parse_str(urldecode($Resdata), $data_atm_sms);
		$data_tabungan = array(
			'status_tabungan'=>$data_atm_sms['status_tabungan'],
			'no_rek_tabungan'=>$data_atm_sms['no_rek_tabungan'],
		);
		$data_giro = array(
			'status_giro'=>$data_atm_sms['status_giro'],
			'no_rek_giro'=>$data_atm_sms['no_rek_giro'],
		);
		$data_rek_transfer = array(
			'no_rek_tujuan'=>$data_atm_sms['no_rek_tujuan'],
			'nama_pemilik_rek'=>$data_atm_sms['nama_pemilik_rek'],
		);
		$data_rek_pemb = array(
			'nama_rekening'=>$data_atm_sms['nama_rekening'],
			'no_pelanggan'=>$data_atm_sms['no_pelanggan'],
		);

		$table_name = 'btn_form_atm_sms';
	  $statusdetail = $wpdb->insert(
	    $table_name,
	      array(
				  'kota' => $data_atm_sms['kota_id'],
				  'cabang' => $data_atm_sms['cabang_aplikasi'],
				  'tanggal' => $data_atm_sms['tanggal_aplikasi'],
				  'nama_lengkap' => strtoupper($data_atm_sms['nama_lengkap_aplikasi']),
				  'tempat_lahir' => $data_atm_sms['tempat_lahir_aplikasi'],
				  'tanggal_lahir' => $data_atm_sms['tanggal_lahir_aplikasi'],
				  'nama_gadis_ibu_kandung' => strtoupper($data_atm_sms['nama_gadis_ibu_kandung_aplikasi']),
				  'alamat_lengkap' => $data_atm_sms['alamat_lengkap_aplikasi'],
				  'no_tlp_rumah' => $data_atm_sms['no_tlp_rumah_aplikasi'],
				  'no_tlp_kantor' => $data_atm_sms['no_tlp_kantor_aplikasi'],
				  'no_hp' => $data_atm_sms['no_hp_aplikasi'],
				  'no_kartu_btn' => $data_atm_sms['no_kartu_aplikasi'],
				  'no_cif' => $data_atm_sms['no_cif_aplikasi'],
				  'kartu_btn' => $data_atm_sms['kartu_btn'],
				  'kartu_baru' => $data_atm_sms['kartu_baru'],
				  'nama_pada_kartu' => $data_atm_sms['nama_pada_kartu'],
				  'penggantian_kartu' => $data_atm_sms['penggantian_kartu'],
				  'alasan_penggantian_kartu' => $data_atm_sms['alasan_penggantian_kartu'], //atau alasan_penggantian_kartu_lainnya
				  'alasan_penggantian_kartu_lain' => $data_atm_sms['alasan_penggantian_kartu_lainnya'],
				  'jenis_kartu' => $data_atm_sms['jenis_kartu'],
				  'status_kartu_instan' => $data_atm_sms['status_kartu_instan'],
				  'update_data' => $data_atm_sms['update_data'],
				  'sms_banking' => $data_atm_sms['sms_banking'],
				  'daftar_rek_tujuan_transfer' => $data_atm_sms['daftar_rek_tujuan_transfer'],
				  'daftar_rek_pembayaran' => $data_atm_sms['daftar_no_rek_pembayaran'],
				  'sms_alert' => $data_atm_sms['sms_alert'],
				  'pendebetan_lebih_dari' => $data_atm_sms['pendebetan_lebih'],
				  'pengkreditan_lebih_dari' => $data_atm_sms['pengkreditan_lebih_dari'],
				  'saldo_kurang_dari' => $data_atm_sms['saldo_kurang_dari'],
				  'no_rek_pendebitan' => $data_atm_sms['no_rek_pendebitan'],
				  'no_rek_pengkreditan' => $data_atm_sms['no_rek_pengkreditan'],
				  'no_rek_saldo' => $data_atm_sms['no_rek_saldo']
				)
		);

		//save to table btn_update_data_giro
		$id_form_atm_sms = $wpdb->insert_id;
		foreach ($data_giro['status_giro'] as $key => $v_giro) {
			$table_name = 'btn_update_data_giro';
		  $statusdetail= $wpdb->insert(
		    $table_name,
		      array(
					  'id_form_atm_sms' => $id_form_atm_sms,
					  'status_giro' => $v_giro,
					  'nomor_rekening' => $data_giro['no_rek_giro'][$key]
					)
			);
		}

	  foreach ($data_tabungan['status_tabungan'] as $key => $v_tabungan) {
			$table_name = 'btn_update_data_tabungan';
		  $statusdetail= $wpdb->insert(
		    $table_name,
		      array(
					  'id_form_atm_sms' => $id_form_atm_sms,
					  'status_tabungan' => $v_tabungan,
					  'no_rekening' => $data_tabungan['no_rek_tabungan'][$key]
					)
			);
		}

		foreach ($data_rek_pemb['nama_rekening'] as $key => $v_rek_pemb) {
			$table_name = 'btn_daftar_rek_pembayaran';
		  $statusdetail= $wpdb->insert(
		    $table_name,
		      array(
					  'id_form_atm_sms' => $id_form_atm_sms,
					  'nama_rekening' => $v_rek_pemb,
					  'no_pelanggan' => $data_rek_pemb['no_pelanggan'][$key]
					)
			);
		}

		foreach ($data_rek_transfer['no_rek_tujuan'] as $key => $v_rek_transfer) {
			$table_name = 'btn_daftar_rek_sms_banking';
		  $statusdetail= $wpdb->insert(
		    $table_name,
		      array(
					  'id_form_atm_sms' => $id_form_atm_sms,
					  'no_rek_tujuan' => $v_rek_transfer,
					  'nama_pemilik_rek' => strtoupper($data_rek_transfer['nama_pemilik_rek'][$key])
					)
			);
		}

		//save to cif relation
		$table_name = 'btn_cif_relation';
	  $status= $wpdb->insert(
	    $table_name,
	      array(
	      	'reg_id' => generate_ID2(),
				  'id_data_pribadi' => 0,
				  'id_data_lembaga' => 0,
				  'jenis_cif' => '',
				  'id_form_simpanan' => 0,
				  'id_form_atm_sms' => $id_form_atm_sms
				)
		);

		ob_clean();
	  	if ($status > 0){
	      echo "success";
	    }else{
	      	      echo "gagal";
	    } //End Success
		wp_die();
	}

	//fungsi save data lembaga
	add_action('wp_ajax_nopriv_btn_ajax_save_lembaga', 'btn_ajax_save_lembaga');
	add_action('wp_ajax_btn_ajax_save_lembaga', 'btn_ajax_save_lembaga');
	function btn_ajax_save_lembaga() {
		global $wpdb;

		$data_lembaga = null;
	  foreach ($_POST['data']['lembaga'] as $lembaga) {
	    $data_lembaga[$lembaga['name']] = $lembaga['value'];
	  }

	  // print_r($data_lembaga);die();
		$table_name = 'btn_data_lembaga';
		$status = $wpdb->insert(
			$table_name,
				array(
				  'nama_lembaga' =>$data_lembaga['nama_lembaga'],
				  'bidang_usaha' =>$data_lembaga['bidang_usaha'], //atau bidang_usaha_lainnya
				  'bidang_usaha_lainnya' =>$data_lembaga['bidang_usaha_lainnya'],
				  'alamat' =>$data_lembaga['alamat_lembaga'],
				  'rt' =>$data_lembaga['rt_lembaga'],
				  'rw' =>$data_lembaga['rw_lembaga'],
				  'kelurahan' =>$data_lembaga['kelurahan_lembaga'],
				  'kecamatan' =>$data_lembaga['kecamatan_lembaga'],
				  'kota' =>$data_lembaga['kota_lembaga'],
				  'provinsi' =>$data_lembaga['propinsi'],
				  'kode_pos' =>$data_lembaga['kodepos_lembaga'],
				  'no_tlp' =>$data_lembaga['no_tlp_lembaga'],
				  'no_fax' =>$data_lembaga['no_fax_lembaga'],
				  'email' =>$data_lembaga['email_lembaga'],
				  'website' =>$data_lembaga['website_lembaga'],
				  'no_npwp' =>$data_lembaga['no_npwp'],
				  'no_anggaran_dasar' =>$data_lembaga['no_anggaran_dasar'],
				  'no_akta_pendirian' =>$data_lembaga['no_akta_pendirian'],
				  'tanggal_akta_pendirian' =>$data_lembaga['tanggal_akta_pendirian'],
				  'diterbitkan_akta_pendirian' =>$data_lembaga['akta_diterbitkan'],
				  'notaris_akta_pendirian' =>$data_lembaga['nama_notaris_akta_pendirian'],
				  'no_akta_perubahan' =>$data_lembaga['no_akta_perubahan'],
				  'tanggal_akta_perubahan' =>$data_lembaga['tanggal_akta_perubahan'],
				  'diterbitkan_akta_perubahan' =>$data_lembaga['akta_perubahan_diterbitkan'],
				  'notaris_akta_perubahan' =>$data_lembaga['nama_notaris_akta_perubahan'],
				  'no_siup' =>$data_lembaga['no_siup'],
				  'tanggal_siup' =>$data_lembaga['tanggal_siup'],
				  'diterbitkan_siup' =>$data_lembaga['siup_diterbitkan'],
				  'siup_masa_berlaku' =>$data_lembaga['siup_berlaku'],
				  'no_tdp' =>$data_lembaga['no_tdp'],
				  'tanggal_tdp' =>$data_lembaga['tanggal_tdp'],
				  'diterbitkan_tdp' =>$data_lembaga['tdp_diterbitkan'],
				  'tdp_masa_berlaku' =>$data_lembaga['tdp_berlaku'],
				  'no_situ' =>$data_lembaga['no_situ'],
				  'tanggal_situ' =>$data_lembaga['tanggal_situ'],
				  'diterbitkan_situ' =>$data_lembaga['situ_diterbitkan'],
				  'situ_masa_berlaku' =>$data_lembaga['situ_berlaku']
				)
			);

			//lembaga group usaha
			$id_data_lembaga = $wpdb->insert_id;
		  	$table_name = 'btn_group_usaha_lembaga';
		  	$statusdetail= $wpdb->insert(
		    $table_name,
		      array(
		    	  'id_data_lembaga'=>$id_data_lembaga,
					'nama_lembaga'=>$data_lembaga['nama_lembaga_group1'],
					'alamat'=>$data_lembaga['alamat_lembaga_group1'],
					'bidang_usaha'=>$data_lembaga['bidang_usaha_group1'],
					'no_tlp'=>$data_lembaga['no_telepon_group1'],
					'no_npwp'=>$data_lembaga['no_npwp_group1']
		      )
		  );

		  //lembaga pengurus
		  $table_name = 'btn_data_pengurus_lembaga';
		  $statusdetail= $wpdb->insert(
		    $table_name,
		      array(
					'id_data_lembaga'=>$id_data_lembaga,
					'nama'=>$data_lembaga['nama_pengurus_1'],
					'alamat'=>$data_lembaga['alamat_pengurus_1'],
					'jabatan'=>$data_lembaga['jabatan_pengurus_1'],
					'no_npwp'=>$data_lembaga['npwp_pribadi_1'],
					'no_ktp'=>$data_lembaga['ktp_pribadi_1'],
					'dikeluarkan_di'=>$data_lembaga['dikeluarkan_ktp_1'],
					'tgl_kadaluwarsa'=>$data_lembaga['ktp_kadaluwarsa_1'],
					'tlp_rumah'=>$data_lembaga['tlp_rumah_1'],
					'no_hp'=>$data_lembaga['no_hp_1']
		      )
		  );

		}


		//udpate perorangan
		add_action('wp_ajax_nopriv_btn_ajax_process_update_perorangan', 'btn_ajax_process_update_perorangan');
		add_action('wp_ajax_btn_ajax_process_update_perorangan', 'btn_ajax_process_update_perorangan');
		function btn_ajax_process_update_perorangan(){
		  global $wpdb;
		  /* head register */
		  $data_pribadi = null;
		  foreach ($_POST['data']['pribadi'] as $data) {
		    $data_pribadi[$data['name']] = $data['value'];
		  }
		  print_r($_POST['data']); die();
		  //Add New
		  $table_name = 'btn_data_pribadi';
		  $status = $wpdb->update(
		    $table_name,
		      array(
		        'nama_sesuai_identitas' => strtoupper($data_pribadi['nama_lengkap']),
		        'nama_tanpa_gelar' => strtoupper($data_pribadi['nama_lengkap_tanpa_gelar']),
		        'gelar_sebelum_nama' => strtoupper($data_pribadi['gelar_sebelum_nama']),
		        'gelar_setelah_nama' => strtoupper($data_pribadi['gelar_setelah_nama']),
		        'nama_alias' => strtoupper($data_pribadi['nama_alias']),
		        'nama_wali' => strtoupper($data_pribadi['nama_wali']),
		        'alamat' => strtoupper($data_pribadi['alamat_pribadi']),
		        'rt' => $data_pribadi['rt_pribadi'],
		        'rw' => $data_pribadi['rw_pribadi'],
		        'kelurahan' => strtoupper($data_pribadi['kelurahan_pribadi']),
		        'kecamatan' => strtoupper($data_pribadi['kecamatan_pribadi']),
		        'kota' => strtoupper($data_pribadi['kota_pribadi']),
		        'kode_pos' => $data_pribadi['kodepos_pribadi'],
		        'propinsi' => strtoupper($data_pribadi['propinsi_pribadi']),
		        'status_alamat' => strtoupper($data_pribadi['status_alamat']),
		        'alamat_saat_ini' => strtoupper($data_pribadi['alama_saat_ini']),
		        'rt_saat_ini' => $data_pribadi['rt_saat_ini'],
		        'rw_saat_ini' => $data_pribadi['rw_saat_ini'],
		        'kelurahan_saat_ini' => strtoupper($data_pribadi['kelurahan_saat_ini']),
		        'kecamatan_saat_ini' => strtoupper($data_pribadi['kecamatan_saat_ini']),
		        'kota_saat_ini' => strtoupper($data_pribadi['kota_saat_ini']),
		        'propinsi_saat_ini' => strtoupper($data_pribadi['propinsi_saat_ini']),
		        'kodepos_saat_ini' => $data_pribadi['kodepos_saat_ini'],
		        'status_alamat_saat_ini'=> strtoupper($data_pribadi['status_alamat_saat_ini']),
		        'tahun_lama_tinggal'=> $data_pribadi['tahun_lama_tinggal'],
		        'bulan_lama_tinggal'=> $data_pribadi['bulan_lama_tinggal'],
		        'no_tlp_1' => $data_pribadi['no_telepon1'],
		        'no_tlp_2' => $data_pribadi['no_telepon2'],
		        'ponsel' => $data_pribadi['ponsel'],
		        'email' => $data_pribadi['email'],
		        'tempat_lahir' => strtoupper($data_pribadi['tempat_lahir']),
		        'tgl_lahir'=> $data_pribadi['tanggal_lahir'],
		        'warganegara' => strtoupper($data_pribadi['kewarganegaraan']),
		        'negara_asal' => strtoupper($data_pribadi['negara_asal']),
		        'jenis_kelamin' => strtoupper($data_pribadi['jenis_kelamin']),
		        'status_penduduk' => strtoupper($data_pribadi['status_penduduk']),
		        'id_pengenal' => strtoupper($data_pribadi['tanda_pengenal']),
		        'no_pengenal' => $data_pribadi['no_tanda_pengenal'],
		        'diterbitkan_pengenal' => strtoupper($data_pribadi['di_terbitkan']),
		        'masa_berlaku_pengenal' => $data_pribadi['berlaku_hingga'], //atau seumur_hidup
		        'id_pengenal_tambahan' => strtoupper($data_pribadi['tanda_pengenal_tambahan']),
		        'no_pengenal_tambahan' => $data_pribadi['no_tanda_pengenal_tambahan'],
		        'diterbitkan_pengenal_tambahan' => strtoupper($data_pribadi['di_terbitkan_tambahan']),
		        'agama' => strtoupper($data_pribadi['agama']),
		        'agama_lainnya' => strtoupper($data_pribadi['agama_lainnya']),
		        'status_kawin' => strtoupper($data_pribadi['status_perkawinan']),
		        'jumlah_anak' => $data_pribadi['jumlah_anak'],
		        'jumlah_tanggungan' => $data_pribadi['jumlah_tanggungan'],
		        'pendidikan' => strtoupper($data_pribadi['pendidikan']),
		        'nama_gadis_ibu_kandung' => strtoupper($data_pribadi['nama_gadis_ibu_kandung']),
		        'nama_lengkap_relasi' => strtoupper($data_pribadi['nama_lengkap_relasi']),
		        'alamat_relasi' => strtoupper($data_pribadi['alamat_relasi']),
		        'no_tlp_relasi' => $data_pribadi['telepon_relasi'],
		        'no_hp_relasi' => $data_pribadi['hp_relasi'],
		        'hubungan_nasabah' => strtoupper($data_pribadi['hubungan_nasabah']),
		        'bidang_usaha' => strtoupper($data_pribadi['bidang_usaha']),
		        'bidang_usaha_lainnya' => strtoupper($data_pribadi['bidang_usaha_lainnya']),
		        'jenis_pekerjaan' => strtoupper($data_pribadi['jenis_pekerjaan']), // atau jenis_pekerjaan_lainnya
		        'jenis_pekerjaan_lainnya' => strtoupper($data_pribadi['jenis_pekerjaan_lainnya']),
		        'jabatan' => strtoupper($data_pribadi['jabatan']),
		        'nama_perusahaan' => strtoupper($data_pribadi['nama_perusahaan']),
		        'alamat_perusahaan' => strtoupper($data_pribadi['alamat_perusahaan']),
		        'rt_perusahaan' => $data_pribadi['rt_perusahaan'],
		        'rw_perusahaan' => $data_pribadi['rw_perusahaan'],
		        'kelurahan_perusahaan' => strtoupper($data_pribadi['kelurahan_perusahaan']),
		        'kecamatan_perusahaan' => strtoupper($data_pribadi['kecamatan_perusahaan']),
		        'kota_perusahaan' => strtoupper($data_pribadi['kota_perusahaan']),
		        'kodepos_perusahaan' => $data_pribadi['kodepos_perusahaan'],
		        'provinsi_perusahaan' => strtoupper($data_pribadi['propinsi_perusahaan']),
		        'tlp_perusahaan' => $data_pribadi['no_telepon_perusahaan'],
		        'fax_perusahaan' => $data_pribadi['fax_perusahaan'],
		        'email_perusahaan' => $data_pribadi['email_perusahaan'],
		        'website_perusahaan' => $data_pribadi['website_perusahaan'],
		        'penghasilan_pemohon' => $data_pribadi['penghasilan'], // atau penghasilan_lainnya
		        'penghasilan_pemohon_lainnya' => $data_pribadi['penghasilan_lainnya'],
		        'penghasilan_tambahan' => $data_pribadi['penghasilan_tambahan'], //atau hasil_tambahan_lainnya
		        'penghasilan_tambahan_lainnya' => $data_pribadi['hasil_tambahan_lainnya'],
		        'nama_penghasilan_tambahan' => strtoupper($data_pribadi['nama_penghasilan_tambahan']),
		      ),
				array( 'id' => $data_pribadi['id'] )

		  );


		  if ($status > 0){
		    echo "success";
		  } //End Success
		}


		//udpate form simapanan
		add_action('wp_ajax_nopriv_btn_ajax_process_update_form_simpanan', 'btn_ajax_process_update_form_simpanan');
		add_action('wp_ajax_btn_ajax_process_update_form_simpanan', 'btn_ajax_process_update_form_simpanan');
		function btn_ajax_process_update_form_simpanan(){
		  global $wpdb;

		  $Resdata = $_POST['data']['simpanan'];
			parse_str(urldecode($Resdata), $data_rek_simpanan);
			$data_sertifikat = array(
													'id_sertifikat'=>$data_rek_simpanan['id_sertifikat'],
													'denominal'=>$data_rek_simpanan['denominal'],
													'lembar'=>$data_rek_simpanan['lembar'],
												);
		 $fitur = json_encode($data_rek_simpanan['fitur']);

		 	//update
		  $table_name = 'btn_form_simpanan';
	  	$status= $wpdb->update(
	    $table_name,
	      array(
	      	// 'id_produk' => $data_rek_simpanan['id_produk'],
				  'menghendaki_jasa_tabungan' => $data_rek_simpanan['jasa_tabungan'],
				  'tahun_berangkat' => $data_rek_simpanan['tahun_keberangkatan'],
				  'wilayah_berangkat' => $data_rek_simpanan['wilayah_keberangkatan'],
	 			  'alasan_penggantian_kartu' => $data_rek_simpanan['alasan_penggantian_kartu'],
	 			  'alasan_penggantian_kartu_lainnya' => $data_rek_simpanan['alasan_penggantian_kartu_lainnya'],
				  'no_cif' => $data_rek_simpanan['no_cif_nasabah'],
				  'nama_lengkap' => strtoupper($data_rek_simpanan['nama_lengkap_nasabah']),
				  'no_rekening' => $data_rek_simpanan['no_rekening_nasabah'],
				  'sumber_dana' => $data_rek_simpanan['sumber_dana'], //atau sumber_dana_lainnya
				  'sumber_dana_lainnya' => $data_rek_simpanan['sumber_dana_lainnya'],
				  'sumber_dana_tambahan' => $data_rek_simpanan['sumber_dana_tambahan'], //atau sumber_dana_tambahan_lainnya
				  'sumber_dana_tambahan_lainnya' => $data_rek_simpanan['sumber_dana_tambahan_lainnya'],
				  'jenis_setoran' => $data_rek_simpanan['jenis_setoran'], //atau jenis_setoran_lainnya
				  'jenis_setoran_lainnya' => $data_rek_simpanan['jenis_setoran_lainnya'],
				  'tujuan_buka_rekening' => $data_rek_simpanan['tujuan_pembukaan_rekening'], //atau tujuan_buka_rek_lainnya
				  'tujuan_buka_rekening_lainnya' => $data_rek_simpanan['tujuan_buka_rek_lainnya'],
				  'alasan_buka_rekening' => $data_rek_simpanan['alasan_membuka_rekening_btn'], //atau alasan_membuka_rekening_lainnya
				  'alasan_buka_rekening_lainnya' => $data_rek_simpanan['alasan_membuka_rekening_lainnya'],
				  'fitur' => $fitur,
				  'nama_pada_kartu' => strtoupper($data_rek_simpanan['nama_pada_kartu']),
				  'jumlah_nominal' => $data_rek_simpanan['jumlah_nominal_deposito'],
				  'terbilang' => $data_rek_simpanan['terbilang'],
				  'mata_uang' => $data_rek_simpanan['mata_uang'],
				  'jangka_waktu' => $data_rek_simpanan['jangka_waktu'], //atau jangka_waktu_hari
				  'jangka_waktu_hari' => $data_rek_simpanan['jangka_waktu_hari'],
				  'suku_bunga' => $data_rek_simpanan['suku_bunga'],
				  'perpanjangan' => $data_rek_simpanan['perpanjangan'],
				  'cara_pembayaran_bunga' => $data_rek_simpanan['cara_pembayaran_bunga'],
				  'pemindahbukuan' => $data_rek_simpanan['pemindahbukuan'],
				  'pemindahbukuan_ke_rek' => $data_rek_simpanan['pemindahbukuan_ke_rek']
	      ),
				array( 'id' => $data_rek_simpanan['id'] )

		  );

			//update sertifikat
			foreach ($data_sertifikat['id_sertifikat'] as $key => $v_sertifikat) {
			  $table_name = 'btn_sertifikat_deposito';
			  $statusdetail= $wpdb->update(
			    $table_name,
			      array(
			      	'denominal' => $data_sertifikat['denominal'][$key],
						  'lembar' => $data_sertifikat['lembar'][$key],
						),
						array( 'id' => $v_sertifikat )
			  );
			}


		  if ($status > 0){
		    echo "success";
		  } //End Success
		}

		//udpate data atm sms
		add_action('wp_ajax_nopriv_btn_ajax_process_update_atm_sms', 'btn_ajax_process_update_atm_sms');
		add_action('wp_ajax_btn_ajax_process_update_atm_sms', 'btn_ajax_process_update_atm_sms');
		function btn_ajax_process_update_atm_sms(){
		  global $wpdb;

		  $Resdata = $_POST['data']['atm_sms'];
			parse_str(urldecode($Resdata), $data_atm_sms);
			$data_tabungan = array(
														'id_tabungan'=>$data_atm_sms['id_tabungan'],
														'status_tabungan'=>$data_atm_sms['status_tabungan'],
														'no_rek_tabungan'=>$data_atm_sms['no_rek_tabungan'],
													);
			$data_giro = array(
														'id_giro'=>$data_atm_sms['id_giro'],
														'status_giro'=>$data_atm_sms['status_giro'],
														'no_rek_giro'=>$data_atm_sms['no_rek_giro'],
													);
			$data_rek_transfer = array(
														'id_daftar_sms'=>$data_atm_sms['id_daftar_sms'],
														'no_rek_tujuan'=>$data_atm_sms['no_rek_tujuan'],
														'nama_pemilik_rek'=>$data_atm_sms['nama_pemilik_rek'],
													);
			$data_rek_pemb = array(
														'id_daftar_rek_pemb'=>$data_atm_sms['id_daftar_rek_pemb'],
														'nama_rekening'=>$data_atm_sms['nama_rekening'],
														'no_pelanggan'=>$data_atm_sms['no_pelanggan'],
													);


		  $table_name = 'btn_form_atm_sms';
	  	$status= $wpdb->update(
	    $table_name,
	      array(
	      		  'kota' => $data_atm_sms['kota_id'],
	      		  'cabang' => $data_atm_sms['cabang_aplikasi'],
				  'tanggal' => $data_atm_sms['tanggal_aplikasi'],
				  'nama_lengkap' => strtoupper($data_atm_sms['nama_lengkap_aplikasi']),
				  'tempat_lahir' => $data_atm_sms['tempat_lahir_aplikasi'],
				  'tanggal_lahir' => $data_atm_sms['tanggal_lahir_aplikasi'],
				  'nama_gadis_ibu_kandung' => strtoupper($data_atm_sms['nama_gadis_ibu_kandung_aplikasi']),
				  'alamat_lengkap' => $data_atm_sms['alamat_lengkap_aplikasi'],
				  'no_tlp_rumah' => $data_atm_sms['no_tlp_rumah_aplikasi'],
				  'no_tlp_kantor' => $data_atm_sms['no_tlp_kantor_aplikasi'],
				  'no_hp' => $data_atm_sms['no_hp_aplikasi'],
				  'no_kartu_btn' => $data_atm_sms['no_kartu_aplikasi'],
				  'no_cif' => $data_atm_sms['no_cif_aplikasi'],
				  'kartu_btn' => $data_atm_sms['kartu_btn'],
				  'kartu_baru' => $data_atm_sms['kartu_baru'],
				  'nama_pada_kartu' => $data_atm_sms['nama_pada_kartu'],
				  'penggantian_kartu' => $data_atm_sms['penggantian_kartu'],
				  'alasan_penggantian_kartu' => $data_atm_sms['alasan_penggantian_kartu'], //atau alasan_penggantian_kartu_lainnya
				  'alasan_penggantian_kartu_lain' => $data_atm_sms['alasan_penggantian_kartu_lainnya'],
				  'jenis_kartu' => $data_atm_sms['jenis_kartu'],
				  'status_kartu_instan' => $data_atm_sms['status_kartu_instan'],
				  'update_data' => $data_atm_sms['update_data'],
				  'sms_banking' => $data_atm_sms['sms_banking'],
				  'daftar_rek_tujuan_transfer' => $data_atm_sms['daftar_rek_tujuan_transfer'],
				  'daftar_rek_pembayaran' => $data_atm_sms['daftar_no_rek_pembayaran'],
				  'sms_alert' => $data_atm_sms['sms_alert'],
				  'pendebetan_lebih_dari' => $data_atm_sms['pendebetan_lebih'],
				  'pengkreditan_lebih_dari' => $data_atm_sms['pengkreditan_lebih_dari'],
				  'saldo_kurang_dari' => $data_atm_sms['saldo_kurang_dari'],
				  'no_rek_pendebitan' => $data_atm_sms['no_rek_pendebitan'],
				  'no_rek_pengkreditan' => $data_atm_sms['no_rek_pengkreditan'],
				  'no_rek_saldo' => $data_atm_sms['no_rek_saldo']
	      ),
				array( 'id' => $data_atm_sms['id'] )

		  );

		foreach ($data_giro['id_giro'] as $key => $v_giro) {
			$table_name = 'btn_update_data_giro';
		  $statusdetail= $wpdb->update(
		    $table_name,
		      array(
					  'status_giro' => $data_giro['status_giro'][$key],
					  'nomor_rekening' => $data_giro['no_rek_giro'][$key]
					),
					array( 'id' => $v_giro )
			);
		}

	  foreach ($data_tabungan['id_tabungan'] as $key => $v_tabungan) {
		  $table_name = 'btn_update_data_tabungan';
		  $statusdetail= $wpdb->update(
		    $table_name,
		      array(
					  'status_tabungan' => $data_tabungan['status_tabungan'][$key],
					  'no_rekening' => $data_tabungan['no_rek_tabungan'][$key]
					),
					array( 'id' => $v_tabungan )
			);
		}

		foreach ($data_rek_pemb['id_daftar_rek_pemb'] as $key => $v_rek_pemb) {
			$table_name = 'btn_daftar_rek_pembayaran';
		  $statusdetail= $wpdb->update(
		    $table_name,
		      array(
					  'nama_rekening' => $data_rek_pemb['nama_rekening'][$key],
					  'no_pelanggan' => $data_rek_pemb['no_pelanggan'][$key]
					),
					array( 'id' => $v_rek_pemb )
			);
		}

		foreach ($data_rek_transfer['id_daftar_sms'] as $key => $v_rek_sms) {
			$table_name = 'btn_daftar_rek_sms_banking';
		  $statusdetail= $wpdb->update(
		    $table_name,
		      array(
					  'no_rek_tujuan' => $data_rek_transfer['no_rek_tujuan'][$key],
					  'nama_pemilik_rek' => $data_rek_transfer['nama_pemilik_rek'][$key]
					),
					array( 'id' => $v_rek_sms )
			);
		}


		  if ($status > 0){
		    echo "success";
		  } //End Success
		}

		//udpate lembaga
		add_action('wp_ajax_nopriv_btn_ajax_process_update_data_lembaga', 'btn_ajax_process_update_data_lembaga');
		add_action('wp_ajax_btn_ajax_process_update_data_lembaga', 'btn_ajax_process_update_data_lembaga');
		function btn_ajax_process_update_data_lembaga(){
		  global $wpdb;

		$Resdata = $_POST['data']['lembaga'];
		parse_str(urldecode($Resdata), $get_array);
		$data_lembaga = $get_array;
		$data_pengurus = array(
													'id_pengurus'=>$get_array['id_pengurus'],
													 'nama_pengurus_1'=>$get_array['nama_pengurus_1'],
													 'alamat_pengurus_1'=>$get_array['alamat_pengurus_1'],
													 'jabatan_pengurus_1'=>$get_array['jabatan_pengurus_1'],
													 'npwp_pribadi_1'=>$get_array['npwp_pribadi_1'],
													 'ktp_pribadi_1'=>$get_array['ktp_pribadi_1'],
													 'dikeluarkan_ktp_1'=>$get_array['dikeluarkan_ktp_1'],
													 'ktp_kadaluwarsa_1'=>$get_array['ktp_kadaluwarsa_1'],
													 'tlp_rumah_1'=>$get_array['tlp_rumah_1'],
													 'no_hp_1'=>$get_array['no_hp_1'],

											);

		$data_group = array(
										 'id_group'=>$get_array['id_group'],
										 'nama_lembaga_group1'=>$get_array['nama_lembaga_group1'],
										 'alamat_lembaga_group1'=>$get_array['alamat_lembaga_group1'],
										 'bidang_usaha_group1'=>$get_array['bidang_usaha_group1'],
										 'no_telepon_group1'=>$get_array['no_telepon_group1'],
										 'no_npwp_group1'=>$get_array['no_npwp_group1'],
									);

		$table_name = 'btn_data_lembaga';
		$status = $wpdb->update(
			$table_name,
				array(
					'nama_lembaga' =>$data_lembaga['nama_lembaga'],
				  'bidang_usaha' =>$data_lembaga['bidang_usaha'], //atau bidang_usaha_lainnya
				  'bidang_usaha_lainnya' =>$data_lembaga['bidang_usaha_lainnya'],
				  'alamat' =>$data_lembaga['alamat_lembaga'],
				  'rt' =>$data_lembaga['rt_lembaga'],
				  'rw' =>$data_lembaga['rw_lembaga'],
				  'kelurahan' =>$data_lembaga['kelurahan_lembaga'],
				  'kecamatan' =>$data_lembaga['kecamatan_lembaga'],
				  'kota' =>$data_lembaga['kota_lembaga'],
				  'provinsi' =>$data_lembaga['propinsi'],
				  'kode_pos' =>$data_lembaga['kodepos_lembaga'],
				  'no_tlp' =>$data_lembaga['no_tlp_lembaga'],
				  'no_fax' =>$data_lembaga['no_fax_lembaga'],
				  'email' =>$data_lembaga['email_lembaga'],
				  'website' =>$data_lembaga['website_lembaga'],
				  'no_npwp' =>$data_lembaga['no_npwp'],
				  'no_anggaran_dasar' =>$data_lembaga['no_anggaran_dasar'],
				  'no_akta_pendirian' =>$data_lembaga['no_akta_pendirian'],
				  'tanggal_akta_pendirian' =>$data_lembaga['tanggal_akta_pendirian'],
				  'diterbitkan_akta_pendirian' =>$data_lembaga['akta_diterbitkan'],
				  'notaris_akta_pendirian' =>$data_lembaga['nama_notaris_akta_pendirian'],
				  'no_akta_perubahan' =>$data_lembaga['no_akta_perubahan'],
				  'tanggal_akta_perubahan' =>$data_lembaga['tanggal_akta_perubahan'],
				  'diterbitkan_akta_perubahan' =>$data_lembaga['akta_perubahan_diterbitkan'],
				  'notaris_akta_perubahan' =>$data_lembaga['nama_notaris_akta_perubahan'],
				  'no_siup' =>$data_lembaga['no_siup'],
				  'tanggal_siup' =>$data_lembaga['tanggal_siup'],
				  'diterbitkan_siup' =>$data_lembaga['siup_diterbitkan'],
				  'siup_masa_berlaku' =>$data_lembaga['siup_berlaku'],
				  'no_tdp' =>$data_lembaga['no_tdp'],
				  'tanggal_tdp' =>$data_lembaga['tanggal_tdp'],
				  'diterbitkan_tdp' =>$data_lembaga['tdp_diterbitkan'],
				  'tdp_masa_berlaku' =>$data_lembaga['tdp_berlaku'],
				  'no_situ' =>$data_lembaga['no_situ'],
				  'tanggal_situ' =>$data_lembaga['tanggal_situ'],
				  'diterbitkan_situ' =>$data_lembaga['situ_diterbitkan'],
				  'situ_masa_berlaku' =>$data_lembaga['situ_berlaku']
				),
				array( 'id' => $data_lembaga['id'] )
			);

			//lembaga group usaha
			foreach ($data_group['id_group'] as $key => $v_group) {
				$table_name = 'btn_group_usaha_lembaga';
			  $statusdetail= $wpdb->update(
			    $table_name,
			      array(
			      'nama_lembaga'=>$data_group['nama_lembaga_group1'][$key],
						'alamat'=>$data_group['alamat_lembaga_group1'][$key],
						'bidang_usaha'=>$data_group['bidang_usaha_group1'][$key],
						'no_tlp'=>$data_group['no_telepon_group1'][$key],
						'no_npwp'=>$data_group['no_npwp_group1'][$key]
			      ),
			      array( 'id' => $v_group )
			  );
			}

		  //lembaga pengurus
		  foreach ($data_pengurus['id_pengurus'] as $key => $v_pengurus) {
			  $table_name = 'btn_data_pengurus_lembaga';
			  $statusdetail= $wpdb->update(
			    $table_name,
			      array(
						'nama'=>$data_pengurus['nama_pengurus_1'][$key],
						'alamat'=>$data_pengurus['alamat_pengurus_1'][$key],
						'jabatan'=>$data_pengurus['jabatan_pengurus_1'][$key],
						'no_npwp'=>$data_pengurus['npwp_pribadi_1'][$key],
						'no_ktp'=>$data_pengurus['ktp_pribadi_1'][$key],
						'dikeluarkan_di'=>$data_pengurus['dikeluarkan_ktp_1'][$key],
						'tgl_kadaluwarsa'=>$data_pengurus['ktp_kadaluwarsa_1'][$key],
						'tlp_rumah'=>$data_pengurus['tlp_rumah_1'][$key],
						'no_hp'=>$data_pengurus['no_hp_1'][$key]
			      ),
			      array( 'id' => $v_pengurus )
			  );
			}

	  if ($status > 0){
	    echo "success";
	  } //End Success
	}

	add_action('wp_ajax_nopriv_btn_ajax_delete_data_cif', 'btn_ajax_delete_data_cif');
	add_action('wp_ajax_btn_ajax_delete_data_cif', 'btn_ajax_delete_data_cif');
	function btn_ajax_delete_data_cif() {
		$id= $_POST['ID'];
		global $wpdb;

		$reg_sql = "SELECT btn_relation.*
	           FROM btn_cif_relation as btn_relation
	           WHERE btn_relation.id =".$id;
		$items = $wpdb->get_results($reg_sql,ARRAY_A);
		foreach ($items as $item)

		if ($item['id_data_pribadi'] !=0) {
			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_data_pribadi
				WHERE id = %d
				",
					array(
						$item['id_data_pribadi']
					)
				)
			);
		}

		if ($item['id_data_lembaga'] !=0) {
			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_data_lembaga
				WHERE id = %d
				",
					array(
						$item['id_data_lembaga']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_data_pengurus_lembaga
				WHERE id_data_lembaga = %d
				",
					array(
						$item['id_data_lembaga']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_group_usaha_lembaga
				WHERE id_data_lembaga = %d
				",
					array(
						$item['id_data_lembaga']
					)
				)
			);
		}

		if ($item['id_form_simpanan'] != 0) {
			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_form_simpanan
				WHERE id = %d
				",
					array(
						$item['id_form_simpanan']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_sertifikat_deposito
				WHERE id_form_simpanan = %d
				",
					array(
						$item['id_form_simpanan']
					)
				)
			);
		}

		if ($item['id_form_atm_sms']!=0) {
			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_form_atm_sms
				WHERE id = %d
				",
					array(
						$item['id_form_atm_sms']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_daftar_rek_pembayaran
				WHERE id_form_atm_sms = %d
				",
					array(
						$item['id_form_atm_sms']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_daftar_rek_sms_banking
				WHERE id_form_atm_sms = %d
				",
					array(
						$item['id_form_atm_sms']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_update_data_giro
				WHERE id_form_atm_sms = %d
				",
					array(
						$item['id_form_atm_sms']
					)
				)
			);

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_update_data_tabungan
				WHERE id_form_atm_sms = %d
				",
					array(
						$item['id_form_atm_sms']
					)
				)
			);
		}

		$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_cif_relation
				WHERE id = %d
				",
					array(
						$item['id']
					)
				)
			);

		echo "success";

		die();
	}

	//Save Product
	add_action('wp_ajax_nopriv_btn_ajax_process_save_product', 'btn_ajax_process_save_product');
	add_action('wp_ajax_btn_ajax_process_save_product', 'btn_ajax_process_save_product');
	function btn_ajax_process_save_product() {
		global $wpdb;

		$Resdata = $_POST['data']['product'];
		parse_str(urldecode($Resdata), $product);
		// print_r($product);die();
		$slug =str_replace(' ', '_', strtolower($product['nama']));
	  $table_name = 'btn_product';
	  $status= $wpdb->insert(
	    $table_name,
	      array(
					'NAME'=>$product['nama'],
					'CIF'=>$product['cif'],
					'ATM_SMS'=>$product['atm_sms'],
					'TYPE'=>$product['type_cif'],
					'STATUS'=>$product['status'],
					'SLUG'=>$slug,
					'CATEGORY'=>strtolower($product['category']),
					'USIA_MINIMAL'=>$product['usia_minimal'],
					'USIA_MAXIMAL'=>$product['usia_maximal'],
			)
		);


	  if ($status > 0){
	    echo "success";
	  } //End Success
	}

	//Update Product
	add_action('wp_ajax_nopriv_btn_ajax_process_update_product', 'btn_ajax_process_update_product');
	add_action('wp_ajax_btn_ajax_process_update_product', 'btn_ajax_process_update_product');
	function btn_ajax_process_update_product() {
		global $wpdb;

		$Resdata = $_POST['data']['product'];
		parse_str(urldecode($Resdata), $product);
		// print_r($product);die();
		$slug =str_replace(' ', '_', strtolower($product['nama']));
	  $table_name = 'btn_product';
	  $status= $wpdb->update(
	    $table_name,
	      array(
					'NAME'=>$product['nama'],
					'CIF'=>$product['cif'],
					'ATM_SMS'=>$product['atm_sms'],
					'TYPE'=>$product['type_cif'],
					'STATUS'=>$product['status'],
					'SLUG'=>$slug,
					'CATEGORY'=>strtolower($product['category']),
					'USIA_MINIMAL'=>$product['usia_minimal'],
					'USIA_MAXIMAL'=>$product['usia_maximal'],
			),
	      array( 'ID_PRODUCT' => $product['id'] )

		);


	  if ($status > 0){
	    echo "success";
	  } //End Success
	}

	add_action('wp_ajax_nopriv_btn_ajax_delete_data_product', 'btn_ajax_delete_data_product');
	add_action('wp_ajax_btn_ajax_delete_data_product', 'btn_ajax_delete_data_product');
	function btn_ajax_delete_data_product() {
		$id= $_POST['ID'];
		global $wpdb;

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_product
				WHERE ID_PRODUCT = %d
				",
					array(
						$id
					)
				)
			);


		echo "success";

		die();
	}

	//save pinjaman kredit
	add_action('wp_ajax_nopriv_btn_ajax_process_pinjaman_kredit', 'btn_ajax_process_pinjaman_kredit');
	add_action('wp_ajax_btn_ajax_process_pinjaman_kredit', 'btn_ajax_process_pinjaman_kredit');
	function btn_ajax_process_pinjaman_kredit() {
		global $wpdb;

		$Resdata = $_POST['data_loan'];

		parse_str(urldecode($Resdata), $data_loan);

		$data_loan['id_reg'] = generate_IDpinjaman();
		$data_loan['nama_lengkap'] = strtoupper($data_loan['nama_lengkap']);
		$data_loan['nama_gadis_ibu_kandung'] = strtoupper($data_loan['nama_gadis_ibu_kandung']);
		$data_loan['nama_keluarga_dekat'] = strtoupper($data_loan['nama_keluarga_dekat']);
		$data_loan['nama_pasangan'] = strtoupper($data_loan['nama_pasangan']);
		
		$data_loan['created'] =  date("Y-m-d H:i:s");
		$data_loan['status']= '0';
		unset($data_loan['captcha']);
		unset($data_loan['alamat_sesuai_dengan_identitas']);
		unset($data_loan['alamat_sesuai_dengan_pemohon']);

		$table_name = 'btn_pinjaman';
	  	$status= $wpdb->insert(
	    $table_name,
	      $data_loan
		);


		ob_clean();
	  if ($status > 0){
	      $return['success'] = true;
	      $return['error'] = false;
	      $return['msg'] = "Data telah kami terima";
	      echo json_encode($return);
	      die();
	  }else{
	      $return['success'] = false;
	      $return['error'] = true;
	      $return['msg'] = "Data gagal disimpan";
	      echo json_encode($return);
	      die();
	  } //End Success
		wp_die();
	}

	//save pinjaman kredit
	add_action('wp_ajax_nopriv_btn_ajax_process_update_pinjaman_kredit', 'btn_ajax_process_update_pinjaman_kredit');
	add_action('wp_ajax_btn_ajax_process_update_pinjaman_kredit', 'btn_ajax_process_update_pinjaman_kredit');
	function btn_ajax_process_update_pinjaman_kredit() {
		global $wpdb;


		$Resdata = $_POST['data_loan'];
		parse_str(urldecode($Resdata), $data_loan);
		// print_r($data_loan);die();
		// print_r($data_loan);die();
		$id = $data_loan['id'];
		unset($data_loan['id']);

		$data_loan['nama_lengkap'] = strtoupper($data_loan['nama_lengkap']);
		$data_loan['nama_gadis_ibu_kandung'] = strtoupper($data_loan['nama_gadis_ibu_kandung']);
		$data_loan['nama_keluarga_dekat'] = strtoupper($data_loan['nama_keluarga_dekat']);
		$data_loan['nama_pasangan'] = strtoupper($data_loan['nama_pasangan']);


		$table_name = 'btn_pinjaman';
	  $status= $wpdb->update(
	    $table_name,
	      // $data_loan,
	      // array('id'=>$id)
	      array(
	      	    'nama_lengkap'=>$data_loan['nama_lengkap'],
					    'no_tanda_pengenal'=>$data_loan['no_tanda_pengenal'],
					    'tanggal_berlaku_pengenal'=>$data_loan['tanggal_berlaku_pengenal'],
					    'alamat'=>$data_loan['alamat'],
					    'blok_alamat'=>$data_loan['blok_alamat'],
					    'no_alamat'=>$data_loan['no_alamat'],
					    'rt'=>$data_loan['rt'],
					    'rw'=>$data_loan['rw'],
					    'kelurahan'=>$data_loan['kelurahan'],
					    'kecamatan'=>$data_loan['kecamatan'],
					    'dati'=>$data_loan['dati'],
					    'propinsi'=>$data_loan['propinsi'],
					    'kode_pos'=>$data_loan['kode_pos'],
					    'alamat_dif_ktp' => $data_loan['alamat_dif_ktp'],
					    'blok_dif_ktp' => $data_loan['blok_dif_ktp'],
					    'no_dif_ktp' => $data_loan['no_dif_ktp'],
					    'rt_dif_ktp' => $data_loan['rt_dif_ktp'],
					    'rw_dif_ktp' => $data_loan['rw_dif_ktp'],
					    'kelurahan_dif_ktp' => $data_loan['kelurahan_dif_ktp'],
					    'kecamatan_dif_ktp' => $data_loan['kecamatan_dif_ktp'],
					    'dati_dif_ktp' =>$data_loan['dati_dif_ktp'],
					    'propinsi_dif_ktp' =>$data_loan['propinsi_dif_ktp'],
					    'kode_pos_dif_ktp' =>$data_loan['kode_pos_dif_ktp'],
					    'tlp_rumah' =>$data_loan['tlp_rumah'],
					    'faximili' =>$data_loan['faximili'],
					    'no_hp' =>$data_loan['no_hp'],
					    'email' =>$data_loan['email'],
					    'status_rumah' =>$data_loan['status_rumah'],
					    'dijaminkan_rumah' =>$data_loan['dijaminkan_rumah'],
					    'lama_di_tempati' =>$data_loan['lama_di_tempati'],
					    'alamat_penagihan_ktp' =>$data_loan['alamat_penagihan_ktp'],
					    'alamat_penagihan_dif_ktp' =>$data_loan['alamat_penagihan_dif_ktp'],
					    'alamat_penagihan_kantor' =>$data_loan['alamat_penagihan_kantor'],
					    'npwp' =>$data_loan['npwp'],
					    'agama' =>$data_loan['agama'],
					    'agama_lainnya' =>$data_loan['agama_lainnya'],
					    'tempat_lahir' =>$data_loan['tempat_lahir'],
					    'tanggal_lahir' =>$data_loan['tanggal_lahir'],
					    'pendidikan' =>$data_loan['pendidikan'],
					    'status_nikah' =>$data_loan['status_nikah'],
					    'nama_gadis_ibu_kandung' =>$data_loan['nama_gadis_ibu_kandung'],
					    'nama_keluarga_dekat' =>$data_loan['nama_keluarga_dekat'],
					    'hubungan_pemohon' =>$data_loan['hubungan_pemohon'],
					    'hubungan_pemohon_lainnya' =>$data_loan['hubungan_pemohon_lainnya'],
					    'alamat_keluarga_dekat' =>$data_loan['alamat_keluarga_dekat'],
					    'blok_keluarga_dekat' =>$data_loan['blok_keluarga_dekat'],
					    'no_alamat_keluarga_dekat' =>$data_loan['no_alamat_keluarga_dekat'],
					    'rt_keluarga_dekat' =>$data_loan['rt_keluarga_dekat'],
					    'rw_keluarga_dekat' =>$data_loan['rw_keluarga_dekat'],
					    'kelurahan_keluarga_dekat' =>$data_loan['kelurahan_keluarga_dekat'],
					    'kecamatan_keluarga_dekat' =>$data_loan['kecamatan_keluarga_dekat'],
					    'dati_keluarga_dekat' =>$data_loan['dati_keluarga_dekat'],
					    'propinsi_keluarga_dekat' =>$data_loan['propinsi_keluarga_dekat'],
					    'kode_pos_keluarga_dekat' =>$data_loan['kode_pos_keluarga_dekat'],
					    'tlp_rumah_keluarga_dekat' =>$data_loan['tlp_rumah_keluarga_dekat'],
					    'no_hp_keluarga_dekat_1' =>$data_loan['no_hp_keluarga_dekat_1'],
					    'no_hp_keluarga_dekat_2' =>$data_loan['no_hp_keluarga_dekat_2'],
					    'nama_pasangan' =>$data_loan['nama_pasangan'],
					    'no_ktp_pasangan' =>$data_loan['no_ktp_pasangan'],
					    'tanggal_berlaku_ktp_pasangan' =>$data_loan['tanggal_berlaku_ktp_pasangan'],
					    'alamat_pasangan' =>$data_loan['alamat_pasangan'],
					    'blok_pasangan' =>$data_loan['blok_pasangan'],
					    'no_alamat_pasangan' =>$data_loan['no_alamat_pasangan'],
					    'rt_pasangan' =>$data_loan['rt_pasangan'],
					    'rw_pasangan' =>$data_loan['rw_pasangan'],
					    'kelurahan_pasangan' =>$data_loan['kelurahan_pasangan'],
					    'kecamatan_pasangan' =>$data_loan['kecamatan_pasangan'],
					    'dati_pasangan' =>$data_loan['dati_pasangan'],
					    'propinsi_pasangan' =>$data_loan['propinsi_pasangan'],
					    'kode_pos_pasangan' =>$data_loan['kode_pos_pasangan'],
					    'tempat_lahir_pasangan' =>$data_loan['tempat_lahir_pasangan'],
					    'tanggal_lahir_pasangan' =>$data_loan['tanggal_lahir_pasangan'],
					    'no_tlp_rumah_pasangan' =>$data_loan['no_tlp_rumah_pasangan'],
					    'no_hp_1_pasangan' =>$data_loan['no_hp_1_pasangan'],
					    'no_hp_2_pasangan' =>$data_loan['no_hp_2_pasangan'],
					    'nama_perusahaan_pemohon' =>$data_loan['nama_perusahaan_pemohon'],
					    'badan_usaha' =>$data_loan['badan_usaha'],
					    'badan_usaha_lainnya' =>$data_loan['badan_usaha_lainnya'],
					    'alamat_perusahaan_pemohon' =>$data_loan['alamat_perusahaan_pemohon'],
					    'blok_perusahaan_pemohon' =>$data_loan['blok_perusahaan_pemohon'],
					    'no_perusahaan_pemohon' =>$data_loan['no_perusahaan_pemohon'],
					    'rt_perusahaan_pemohon' =>$data_loan['rt_perusahaan_pemohon'],
					    'rw_perusahaan_pemohon' =>$data_loan['rw_perusahaan_pemohon'],
					    'kelurahan_perusahaan_pemohon' =>$data_loan['kelurahan_perusahaan_pemohon'],
					    'kecamatan_perusahaan_pemohon' =>$data_loan['kecamatan_perusahaan_pemohon'],
					    'dati_perusahaan_pemohon' =>$data_loan['dati_perusahaan_pemohon'],
					    'propinsi_perusahaan_pemohon' =>$data_loan['propinsi_perusahaan_pemohon'],
					    'kode_pos_perusahaan_pemohon' =>$data_loan['kode_pos_perusahaan_pemohon'],
					    'no_tlp_perusahaan_pemohon' =>$data_loan['no_tlp_perusahaan_pemohon'],
					    'no_ext_perusahaan_pemohon' =>$data_loan['no_ext_perusahaan_pemohon'],
					    'jenis_pekerjaan_pemohon' =>$data_loan['jenis_pekerjaan_pemohon'],
					    'jenis_pekerjaan_lain' =>$data_loan['jenis_pekerjaan_lain'],
					    'bidang_usaha_pemohon' =>$data_loan['bidang_usaha_pemohon'],
					    'jabatan_pemohon' =>$data_loan['jabatan_pemohon'],
					    'lama_menjabat' =>$data_loan['lama_menjabat'],
					    'total_masa_kerja' =>$data_loan['total_masa_kerja'],
					    'nip_pemohon' =>$data_loan['nip_pemohon'],
					    'nama_atasan' =>$data_loan['nama_atasan'],
					    'no_tlp_atasan' =>$data_loan['no_tlp_atasan'],
					    'no_hp_atasan' =>$data_loan['no_hp_atasan'],
					    'nama_perusahaan_pasangan' =>$data_loan['nama_perusahaan_pasangan'],
					    'badan_usaha_perusahaan_pasangan' =>$data_loan['badan_usaha_perusahaan_pasangan'],
					    'badan_usaha_perusahaan_pasangan_lainnya' =>$data_loan['badan_usaha_perusahaan_pasangan_lainnya'],
					    'alamat_perusahaan_pasangan' =>$data_loan['alamat_perusahaan_pasangan'],
					    'blok_perusahaan_pasangan' =>$data_loan['blok_perusahaan_pasangan'],
					    'no_perusahaan_pasangan' =>$data_loan['no_perusahaan_pasangan'],
					    'rt_perusahaan_pasangan' =>$data_loan['rt_perusahaan_pasangan'],
					    'rw_perusahaan_pasangan' =>$data_loan['rw_perusahaan_pasangan'],
					    'kelurahan_perusahaan_pasangan' =>$data_loan['kelurahan_perusahaan_pasangan'],
					    'kecamatan_perusahaan_pasangan' =>$data_loan['kecamatan_perusahaan_pasangan'],
					    'dati_perusahaan_pasangan' =>$data_loan['dati_perusahaan_pasangan'],
					    'propinsi_perusahaan_pasangan' =>$data_loan['propinsi_perusahaan_pasangan'],
					    'kode_pos_perusahaan_pasangan' =>$data_loan['kode_pos_perusahaan_pasangan'],
					    'tlp_perusahaan_pasangan' =>$data_loan['tlp_perusahaan_pasangan'],
					    'ext_perusahaan_pasangan' =>$data_loan['ext_perusahaan_pasangan'],
					    'fax_perusahaan_pasangan' =>$data_loan['fax_perusahaan_pasangan'],
					    'jenis_pekerjaan_pasangan' =>$data_loan['jenis_pekerjaan_pasangan'],
					    'jenis_pekerjaan_pasangan_lain' =>$data_loan['jenis_pekerjaan_pasangan_lain'],
					    'bidang_usaha_pasangan' =>$data_loan['bidang_usaha_pasangan'],
					    'jabatan_pasangan' =>$data_loan['jabatan_pasangan'],
					    'lama_menjabat_pasangan' =>$data_loan['lama_menjabat_pasangan'],
					    'total_masa_kerja_pasangan' =>$data_loan['total_masa_kerja_pasangan'],
					    'nip_pasangan' =>$data_loan['nip_pasangan'],
					    'nama_atasan_pasangan' =>$data_loan['nama_atasan_pasangan'],
					    'no_tlp_atasan_pasangan' =>$data_loan['no_tlp_atasan_pasangan'],
					    'no_hp_pasangan' =>$data_loan['no_hp_pasangan'],
					    'penghasilan_pemohon' =>$data_loan['penghasilan_pemohon'],
					    'penghasilan_tambahan_pemohon' =>$data_loan['penghasilan_tambahan_pemohon'],
					    'penghasilan_utama_pasangan' =>$data_loan['penghasilan_utama_pasangan'],
					    'penghasilan_tambahan_pasangan' =>$data_loan['penghasilan_tambahan_pasangan'],
					    'total_penghasilan' =>$data_loan['total_penghasilan'],
					    'biaya_rumah_tangga' =>$data_loan['biaya_rumah_tangga'],
					    'angsuran_lainnya' =>$data_loan['angsuran_lainnya'],
					    'sisa_penghasilan' =>$data_loan['sisa_penghasilan'],
					    'kemampuan_angsuran' =>$data_loan['kemampuan_angsuran'],
					    'tipe_produk' =>$data_loan['tipe_produk'],
					    'tipe_produk_lainnya' =>$data_loan['tipe_produk_lainnya'],
					    'harga_jual' =>$data_loan['harga_jual'],
					    'uang_muka' =>$data_loan['uang_muka'],
					    'uang_muka_persentasi' =>$data_loan['uang_muka_persentasi'],
					    'nilai_kredit_yang_diajukan' =>$data_loan['nilai_kredit_yang_diajukan'],
					    'sistem_pembayaran' =>$data_loan['sistem_pembayaran'],
					    'jangka_waktu_kredit' =>$data_loan['jangka_waktu_kredit'],
					    'penggunaan' =>$data_loan['penggunaan'],
					    'penggunaan_lainnya' =>$data_loan['penggunaan_lainnya'],
					    'alamat_perusahaan_angunan' =>$data_loan['alamat_perusahaan_angunan'],
					    'blok_perusahaan_angunan' =>$data_loan['blok_perusahaan_angunan'],
					    'no_perusahaan_angunan' =>$data_loan['no_perusahaan_angunan'],
					    'rt_perusahaan_angunan' =>$data_loan['rt_perusahaan_angunan'],
					    'rw_perusahaan_angunan' =>$data_loan['rw_perusahaan_angunan'],
					    'kelurahan_perusahaan_angunan' =>$data_loan['kelurahan_perusahaan_angunan'],
					    'kecamatan_perusahaan_angunan' =>$data_loan['kecamatan_perusahaan_angunan'],
					    'dati_perusahaan_angunan' =>$data_loan['dati_perusahaan_angunan'],
					    'propinsi_perusahaan_angunan' =>$data_loan['propinsi_perusahaan_angunan'],
					    'kode_pos_perusahaan_angunan' =>$data_loan['kode_pos_perusahaan_angunan'],
					    'status_kepemilikan_angunan' =>$data_loan['status_kepemilikan_angunan'],
					    'no_sertifikat_bangunan_tanah' =>$data_loan['no_sertifikat_bangunan_tanah'],
					    'tanggal_terbit_sertifikat' =>$data_loan['tanggal_terbit_sertifikat'],
					    'luas_tanah' =>$data_loan['luas_tanah'],
					    'luas_bangunan' =>$data_loan['luas_bangunan'],
					    'bangunan_atas_nama' =>$data_loan['bangunan_atas_nama'],
					    'no_imb' =>$data_loan['no_imb'],
					    'tanggal_tebit_imb' =>$data_loan['tanggal_tebit_imb'],
					    'nama_pengembang' =>$data_loan['nama_pengembang'],
					    'nama_proyek_perumahan' =>$data_loan['nama_proyek_perumahan'],
					    'nama_penjual' =>$data_loan['nama_penjual'],
					    'jenis_kendaraan' =>$data_loan['jenis_kendaraan'],
					    'merk_kendaraan' =>$data_loan['merk_kendaraan'],
					    'model_kendaraan' =>$data_loan['model_kendaraan'],
					    'type_kendaraan' =>$data_loan['type_kendaraan'],
					    'no_mesin' =>$data_loan['no_mesin'],
					    'no_rangka' =>$data_loan['no_rangka'],
					    'no_bpkb' =>$data_loan['no_bpkb'],
					    'tanggal_terbit_kendaraan' =>$data_loan['tanggal_terbit_kendaraan'],
					    'no_polisi' =>$data_loan['no_polisi'],
					    'dealer' =>$data_loan['dealer'],
					    'pemilik_angunan_depsito' =>$data_loan['pemilik_angunan_depsito'],
					    'nama_bank_deposito' =>$data_loan['nama_bank_deposito'],
					    'no_simpanan_deposito' =>$data_loan['no_simpanan_deposito'],
					    'nilai_deposito' =>$data_loan['nilai_deposito'],
					    'bunga_simpanan_deposito' =>$data_loan['bunga_simpanan_deposito'],
					    'tanggal_terbit_deposito' =>$data_loan['tanggal_terbit_deposito'],
					    'jatuh_tempo_kredit_deposito' =>$data_loan['jatuh_tempo_kredit_deposito'],
					    'jangka_waktu_kredit_deposito' =>$data_loan['jangka_waktu_kredit_deposito'],
					    'model_deposito' =>$data_loan['model_deposito'],
					    'no_sk' =>$data_loan['no_sk'],
					    'tanggal_terbit_sk' =>$data_loan['tanggal_terbit_sk'],
					    'nama_bank_pinjaman_lain' =>$data_loan['nama_bank_pinjaman_lain'],
					    'jenis_produk_pinjaman_lain' =>$data_loan['jenis_produk_pinjaman_lain'],
					    'plafond' =>$data_loan['plafond'],
					    'tunggakan' =>$data_loan['tunggakan'],
					    'outstanding' =>$data_loan['outstanding'],
					    'angsuran_pinjaman_lain' =>$data_loan['angsuran_pinjaman_lain'],
					    'tabungan_kekayaan' =>$data_loan['tabungan_kekayaan'],
					    'rata_rata_saldo_tabungan' =>$data_loan['rata_rata_saldo_tabungan'],
					    'atas_nama_tabungan' =>$data_loan['atas_nama_tabungan'],
					    'giro_kekayaan' =>$data_loan['giro_kekayaan'],
					    'rata_rata_saldo_giro' =>$data_loan['rata_rata_saldo_giro'],
					    'atas_nama_giro' =>$data_loan['atas_nama_giro'],
					    'deposito_kekayaan' =>$data_loan['deposito_kekayaan'],
					    'rata_rata_saldo_deposito' =>$data_loan['rata_rata_saldo_deposito'],
					    'atas_nama_deposito' =>$data_loan['atas_nama_deposito'],
					    'atas_nama_rumah'=>$data_loan['atas_nama_rumah'],
					    'nilai_rumah'=>$data_loan['nilai_rumah'],
					    'atas_nama_kendaraan'=>$data_loan['atas_nama_kendaraan'],
					    'nilai_kendaraan'=>$data_loan['nilai_kendaraan'],

	      	),
	      array('id' => $id )


	  );


		ob_clean();
	  if ($status > 0){
	      $return['success'] = true;
	      $return['error'] = false;
	      $return['msg'] = "Data telah berhasil diupdate";
	      echo json_encode($return);
	      die();
	  }else{
	      $return['success'] = false;
	      $return['error'] = true;
	      $return['msg'] = "Data gagal diupdate";
	      echo json_encode($return);
	      die();
	  } //End Success
		wp_die();
	}

	add_action('wp_ajax_nopriv_btn_ajax_delete_data_pinjaman', 'btn_ajax_delete_data_pinjaman');
	add_action('wp_ajax_btn_ajax_delete_data_pinjaman', 'btn_ajax_delete_data_pinjaman');
	function btn_ajax_delete_data_pinjaman() {
		$id= $_POST['ID'];
		global $wpdb;

			$wpdb->query(
				$wpdb->prepare(
				"
				DELETE FROM btn_pinjaman
				WHERE id = %d
				",
					array(
						$id
					)
				)
			);

		echo "success";

		die();
	}

	add_action('admin_head', 'admin_custom_css');
	function admin_custom_css() {
	 echo '<style>
	   #update-nag, .update-nag, #latest-comments{display:none;}
	 </style>';
	}

	add_action('wp_ajax_nopriv_btn_ajax_captcha', 'btn_ajax_captcha');
	add_action('wp_ajax_btn_ajax_captcha', 'btn_ajax_captcha');
	function btn_ajax_captcha() {
		$match1 = $_SESSION['captcha_id'];
		$match2 = $_POST['captcha'];
	  if ( $match1 == $match2 ) {
			echo 'true';
		} else {
		  echo 'false';
		}
		die();
	}

	function btn_ajax_create_captcha() {
		unset( $_SESSION['captcha_id'] );
		session_start();
		$chars = strtoupper( substr( str_shuffle( 'abcdefghjkmnpqrstuvwxyz' ), 0, 4 ) );
		$str = rand( 1, 7 ) . rand( 1, 7 ) . $chars;
		$_SESSION['captcha_id'] = $str;
		return $str;
	}

	add_action('wp_ajax_nopriv_btn_ajax_uncaptcha', 'btn_ajax_uncaptcha');
	add_action('wp_ajax_btn_ajax_uncaptcha', 'btn_ajax_uncaptcha');
	function btn_ajax_uncaptcha() {
		ob_clean();
		$html = '<img src=' . get_template_directory_uri() . '/inc/captcha/image.php?token=' . btn_ajax_create_captcha() . ' width="132" height="46" alt="Captcha image"/>';
		echo $html;
		die();
	}

	function create_table_web_service() {
		global $wpdb;
		$table_name = 'btn_web_service';
		$charset_collate = $wpdb->get_charset_collate();
		$sql = "CREATE TABLE IF NOT EXISTS $table_name (
		  id int(11) NOT NULL AUTO_INCREMENT,
		  no_registrasi varchar(20),
		  PRIMARY KEY (id)
		) $charset_collate;";
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
	}
	add_action( 'init', 'create_table_web_service' );

	function replaceSymbol( $data ) {
		if ( $data == NULL ) {
			return $data = '0';
		} else {
			return str_replace( array( '(', ')', ' ', '-', '_', '<', '>', '/' ), '', $data);
		}
	}