<?php
$html = '
		<h3>District Admin List</h3>
		<table border="1" style="width:100%">
			<thead>
				<tr class="headerrow">
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Email</th>
					<th>Mobile Number</th>
					<th>Created Date</th>
				</tr>
			</thead>
			<tbody>';

			foreach($all_users as $row):
			$html .= '		
				<tr class="oddrow">
					<td>'.$row['username'].'</td>
					<td>'.$row['firstname'].'</td>
					<td>'.$row['lastname'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['mobile_no'].'</td>
					<td>'.$row['created_at'].'</td>
				</tr>';
			endforeach;

			$html .=	'</tbody>
			</table>			
		 ';
				
		$mpdf = new mPDF('c');
		$mpdf->SetProtection(array('print'));
		$mpdf->SetTitle("Light Admin - Distric Admin List");
		$mpdf->SetAuthor("Codeglamour");
		$mpdf->watermark_font = 'Codeglamour';
		$mpdf->watermarkTextAlpha = 0.1;
		$mpdf->SetDisplayMode('fullpage');		 
		 
		$mpdf->WriteHTML($html);
		$filename = 'dadmin_pdf';
		ob_clean();
		$mpdf->Output($filename . '.pdf', 'D');
		exit();

?>