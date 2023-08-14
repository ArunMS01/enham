<?php
include('../../config/app.php');
error_reporting(E_ALL);
ini_set('display_errors', '1');
include_once('../controllers/CategoryController.php');
include_once('../controllers/OrderController.php');
include_once('../controllers/ProductController.php');
require '../phpspreadsheet/vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
if (isset($_POST['export'])) {
    $ext = $_POST['file_type'];
    $startdate = $_POST['start_date'];
    $enddate = $_POST['end_date'];
    $filename = "orders-sheet-".time();
    $getorder = new OrderController;
    $getproduct_details = new ProductController;
   $data = $getorder->export($startdate,$enddate);
//   print_r($data);
    if($data){
       
        
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'orderNumber');
        $sheet->setCellValue('C1', 'ordered_on');
        $sheet->setCellValue('D1', 'item_name');
        $sheet->setCellValue('E1', 'item_quanitity');
        $sheet->setCellValue('F1', 'hsn');
        $sheet->setCellValue('G1', 'tax');
        $sheet->setCellValue('H1', 'gst_rate');
        $sheet->setCellValue('I1', 'net_value');
        $sheet->setCellValue('J1', 'customer_address');
        $sheet->setCellValue('K1', 'state');
        $sheet->setCellValue('L1', 'zip');
        $sheet->setCellValue('M1', 'city');
        $sheet->setCellValue('N1', 'country');
        $row_count =2;
        foreach($data as $order_data){
        $sheet->setCellValue('A' . $row_count, $order_data['id']);
        $sheet->setCellValue('B' . $row_count, $order_data['order_number']);
        $sheet->setCellValue('C' . $row_count, date("m-d-Y", strtotime($order_data["ordered_on"])));
        $sheet->setCellValue('D' . $row_count, $getproduct_details->getProductname($order_data['product_id']));
        $sheet->setCellValue('E' . $row_count, $order_data['quantity']);
        $sheet->setCellValue('F' . $row_count, "NA");
        $sheet->setCellValue('G' . $row_count, $order_data['tax']);
        $sheet->setCellValue('H' . $row_count, "NA");
        $sheet->setCellValue('I' . $row_count, $order_data['itemstotal']);
        $sheet->setCellValue('J' . $row_count, $order_data['ship_address1'] . ' ' . $order_data['ship_address2']);
        $sheet->setCellValue('K' . $row_count, $order_data['ship_zone']);
        $sheet->setCellValue('L' . $row_count, $order_data['ship_zip']); 
        $sheet->setCellValue('M' . $row_count, $order_data['ship_city']);
        $sheet->setCellValue('N' . $row_count, $order_data['ship_country']); $row_count++;
        }
         
        if($ext == 'xlsx'){
            $writer = new Xlsx($spreadsheet);
            $final_filename = $filename.'.xlsx';
        }
        elseif($ext == 'xlsx'){
            $writer = new Xls($spreadsheet);
            $final_filename = $filename.'.xls';
        }
         elseif($ext == 'csv'){
            $writer = new Csv($spreadsheet);
            $final_filename = $filename.'.csv';
        }
        // $writer->save($final_filename);
        header('Content-Type:application/vmd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($final_filename) .'"');
         $writer->save('php://output');
        }
    
    else{
        redirect("NO data found", "admin/orders.php");
        return false;
    }
}





if (isset($_POST['exportproducts'])) {
    $ext = $_POST['file_type'];
    $filename = "Products-sheet-".time();
    $getproducts = new ProductController;
    $data = $getproducts->export();
    if($data){
    
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Id');
        $sheet->setCellValue('B1', 'name');
        $sheet->setCellValue('C1', 'price');
        $sheet->setCellValue('D1', 'regular price');
        $sheet->setCellValue('E1', 'Quantity');
        $sheet->setCellValue('F1', 'Sku');
        $sheet->setCellValue('G1', 'Published On');
        $sheet->setCellValue('H1', 'URL');
         $sheet->setCellValue('I1', 'Image');
          $sheet->setCellValue('J1', 'Title');
           $sheet->setCellValue('K1', 'Description');
               $sheet->setCellValue('L1', 'Long Description');
        $row_count =2;
        foreach($data as $prod_data){
        $sheet->setCellValue('A' . $row_count, $prod_data['id']);
        $sheet->setCellValue('B' . $row_count, $prod_data['name']);
        $sheet->setCellValue('C' . $row_count, $prod_data['price']);
        $sheet->setCellValue('D' . $row_count, $prod_data['regular_price']);
        $sheet->setCellValue('E' . $row_count, $prod_data['quantity']);
        $sheet->setCellValue('F' . $row_count, $prod_data['sku']);
        $sheet->setCellValue('G' . $row_count, date("m-d-Y", strtotime($prod_data["added_on"])));
         $sheet->setCellValue('H' . $row_count, SITE_URL."product/".$prod_data['url']);
           $sheet->setCellValue('I' . $row_count, SITE_URL."admin/assets/product-images/".$prod_data['image']);
           $sheet->setCellValue('J' . $row_count, $prod_data['title']);
           $sheet->setCellValue('K' . $row_count, strip_tags($prod_data['short_decs']));
           $sheet->setCellValue('L' . $row_count, strip_tags($prod_data['long_desc']));
    $row_count++;
        }
         
        if($ext == 'xlsx'){
            $writer = new Xlsx($spreadsheet);
            $final_filename = $filename.'.xlsx';
        }
        elseif($ext == 'xlsx'){
            $writer = new Xls($spreadsheet);
            $final_filename = $filename.'.xls';
        }
         elseif($ext == 'csv'){
            $writer = new Csv($spreadsheet);
            $final_filename = $filename.'.csv';
        }
        // $writer->save($final_filename);
        header('Content-Type:application/vmd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($final_filename) .'"');
         $writer->save('php://output');
        }
    
    else{
        redirect("NO data found", "admin/products.php");
        return false;
    }
}