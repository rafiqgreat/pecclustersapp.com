<?php

$html = '
		<h3>PEF School List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr>
				  <th>#ID</th>
				  <th>Type</th>
				  <th>Cluster Center</th>
				  <th>Name</th>
				  <th>Address</th>
				  <th>District</th>
				  <th>Tehsil</th>
				  <th>Gender</th>
				  <th>Status</th>
			 	</tr>
			  </thead>
			<tbody>';
			//echo '<PRE>';
			//print_r($all_school);
			//die();
			foreach($all_pefschool as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['cs_id'].'</td>
					<td>'.$row['cs_type'].'</td>
					<td>'.$row['cs_parent'].'</td>
					<td>'.$row['cs_name'].'</td>
					<td>'.$row['cs_address'].'</td>
					<td>'.$row['cs_district_id'].'</td>
					<td>'.$row['cs_tehsil_id'].'</td>
					<td>'.$row['cs_gender'].'</td>
					<td>'.(($row['cs_status']==1)?'Active':'Inactive').'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
		$mpdf = new mPDF('c');

		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Light Admin - PEF School List");
		$mpdf->SetAuthor("Codeglamour");
		$mpdf->watermark_font = 'Codeglamour';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 

		$mpdf->WriteHTML($html);

		$filename = 'pefschool_list';

		ob_clean();

		$mpdf->Output($filename . '.pdf', 'D');

		exit();
?>