<?php
require("fpdf.php");
class PDF extends FPDF
{
	var $id;
 	private $widths;
	private $aligns;

	function Header()
	{
		//Arial bold 15
		$this->SetFont('Arial','B',13);

		$this->Cell(50,10,"BTN Virtual Branch",0,0,'L');
		$this->Ln(20);
	}
	function Footer()
	{
		//Position at 1.5 cm from bottom
		$this->SetY(-17);
		//Arial italic 8
		$this->SetFont('Arial','B',10);
		//Page number
		$this->Cell(0,5,'',0,0,'R');
		$this->SetY(-12);
		$this->Cell(0,5,'',0,0,'R');
		$this->SetY(-2);
		$this->SetFont('Arial','I',8);
		$this->Cell(0,-10,'Page '.$this->PageNo(),0,0,'C');
	}
	//Load data
	function LoadData($file)
	{
		//Read file lines
		$lines=file($file);
		$data=array();
		foreach($lines as $line)
			$data[]=explode(';',chop($line));
		return $data;
	}

	//Simple table
  function BasicTable($data,$judul,$titledown)
	{
		//Header
		$this->SetFont('Arial','B',12);
		$this->Cell(0,2,$judul,0,0,'C');
		$this->ln(15,2);
		$this->SetFont('Arial','B',10);
		$this->Cell(0,2,$titledown,0,0);
		$this->ln(5,2);
		// Data
		$this->SetFont('Arial','B',10);
		$this->SetWidths(array(10, 60, 120));
		$this->SetAligns(array('L','L','L'));
		$no=1;
		$w = array(10, 60, 120);
		foreach($data as $row)
		{
			$this->SetFont('Arial','',9);
			$this->Cell($w[0],10,$no,1);
			$this->Cell($w[1],10,	ucwords(strtolower(str_replace('_',' ', $row[1] ))) ,1);
			$this->Cell($w[2],10,$row[2],1);
			$this->Ln();
			$no++;
		}
	}

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}

	function Row($data)
	{
		//Calculate the height of the row
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=4*$nb;
		//Issue a page break first if needed
		$this->CheckPageBreak($h);
		//Draw the cells of the row
		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			//Save the current position
			$x=$this->GetX();
			$y=$this->GetY();
			//Draw the border
			$this->Rect($x,$y,$w,$h);
			//Print the text
			$this->MultiCell($w,4,$data[$i],0,$a);
			//Put the position to the right of the cell
			$this->SetXY($x+$w,$y);
		}
		//Go to the next line
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
			$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
			$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
				$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
						$i++;
				}
				else
					$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
				$i++;
		}
		return $nl;
	}

	function BasicTableColumd($header, $data,$judul)
{
		//Header
		
		$this->SetFont('Arial','B',10);
		$this->Cell(0,2,$judul,0,0);
		$this->ln(5,2);
		// Header
    foreach($header as $col)
        $this->Cell(95,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
    	$this->SetFont('Arial','',9);
        foreach($row as $col)
            $this->Cell(95,6,$col,1);
        $this->Ln();
    }
}

function BasicTable2($data,$judul)
	{
		//Header
		$this->SetFont('Arial','B',10);
		$this->Cell(0,2,$judul,0,0);
		$this->ln(5,2);
		// Data
		$no=1;
		$w = array(10, 60, 120);
		foreach($data as $row)
		{
			$this->SetFont('Arial','',9);
			$this->Cell($w[0],10,$no,1);
			$this->Cell($w[1],10,	ucwords(strtolower(str_replace('_',' ', $row[1] ))) ,1);
			$this->Cell($w[2],10,$row[2],1);
			$this->Ln();
			$no++;
		}
	}


}
?>
