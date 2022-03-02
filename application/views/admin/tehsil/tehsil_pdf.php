<?php

$html = '
		<h3>Tehsil List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>#ID</th>
					<th>#Tehsil Code</th>
					<th>Tehsil Name (English)</th>
					<th>Tehsil Name (Urdu)</th>
					<th>District</th>
					<th>Order</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>';
			//print_r($all_tehsil);
			//die();			
			foreach($all_tehsil as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['tehsil_id'].'</td>
					<td>'.$row['tehsil_code'].'</td>
					<td>'.$row['tehsil_name_en'].'</td>
					<td>'.$row['tehsil_name_ur'].'</td>
					<td>'.$row['district_name_en'].'</td>
					<td>'.$row['tehsil_order'].'</td>
					<td>'.(($row['tehsil_status']==1)?'Active':'Inactive').'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
		 $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
		 $fontDirs = $defaultConfig['fontDir'];
		 
		 $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
		 $fontData = $defaultFontConfig['fontdata'];
		 $mpdf = new \Mpdf\Mpdf(['autoArabic' => true,
		'fontDir' => array_merge($fontDirs, [ 'D:\xampp\htdocs\www\itembanksystem.com\assets\fonts',]),
		'fontdata' => $fontData + [
			'urdufont' => [
				'R' => 'NotoNastaliqUrdu-Regular.ttf',
				'I' => 'NotoNastaliqUrdu-Regular.ttf',
			]
		],
		'default_font' => 'verdana']);
		$mpdf->autoScriptToLang = true;
		$mpdf->autoLangToFont = true;
		$mpdf->SetAuthor("PEC IT TEAM");
		$mpdf->SetTitle("Tehsil List");
		$mpdf->watermark_font = 'PEC-IT-TEAM-RAFIQ';
		$filename = 'Tehsil_list';
		ob_clean();
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename . '.pdf', 'D');
		exit();	
?>