<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;



$app = new \Slim\App();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});
$app->add(function ($req, $res, $next) {
    $response = $next($req, $res);
    return $response
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
});

$app->get('/api/automjetet', function (Request $request, Response $response) {
    $sql = 'SELECT * FROM automjetet_sma';
	try{
		
		$db = new db();
		 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$automjetet = $stmt->fetchAll(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($automjetet);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});


$app->get('/api/automjeti/{Id_SMA}', function (Request $request, Response $response) {
	
	$Id_SMA = $request->getAttribute('Id_SMA');
	
    $sql = "SELECT * FROM automjetet_sma WHERE Id_SMA = '$Id_SMA'";
	try{
		
		$db = new db();
		 
		$db=$db->connect();
		
		$stmt = $db->query($sql);
		$automjeti = $stmt->fetch(PDO::FETCH_OBJ);
		$db = null;
		echo json_encode($automjeti);
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});



$app->post('/api/automjeti/shto', function (Request $request, Response $response) {
	
	$Marka_Automjetit_SMA = $request->getParam('Marka_Automjetit_SMA');
	$Modeli_Automjetit_SMA = $request->getParam('Modeli_Automjetit_SMA');
	$Viti_Prodhimit_SMA = $request->getParam('Viti_Prodhimit_SMA');
	$Motorri_Automjetit_SMA = $request->getParam('Motorri_Automjetit_SMA');
	$Numri_Uleseve_SMA = $request->getParam('Numri_Uleseve_SMA');
	$Ngjyra_Automjetit_SMA = $request->getParam('Ngjyra_Automjetit_SMA');
	$Qmimi_Automjetit_SMA = $request->getParam('Qmimi_Automjetit_SMA');
	
    $sql = "INSERT INTO automjetet_sma (Marka_Automjetit_SMA, Modeli_Automjetit_SMA, Viti_Prodhimit_SMA, Motorri_Automjetit_SMA, Numri_Uleseve_SMA, Ngjyra_Automjetit_SMA, Qmimi_Automjetit_SMA) 
	VALUES(:Marka_Automjetit_SMA, :Modeli_Automjetit_SMA, :Viti_Prodhimit_SMA, :Motorri_Automjetit_SMA, :Numri_Uleseve_SMA, :Ngjyra_Automjetit_SMA, :Qmimi_Automjetit_SMA)";
	try{
		
		$db = new db();
		 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Marka_Automjetit_SMA',$Marka_Automjetit_SMA);
		$stmt->bindParam(':Modeli_Automjetit_SMA',$Modeli_Automjetit_SMA);
		$stmt->bindParam(':Viti_Prodhimit_SMA',$Viti_Prodhimit_SMA);
		$stmt->bindParam(':Motorri_Automjetit_SMA',$Motorri_Automjetit_SMA);
		$stmt->bindParam(':Numri_Uleseve_SMA',$Numri_Uleseve_SMA);
		$stmt->bindParam(':Ngjyra_Automjetit_SMA',$Ngjyra_Automjetit_SMA);
		$stmt->bindParam(':Qmimi_Automjetit_SMA',$Qmimi_Automjetit_SMA);
		
		$stmt->execute();
		echo'{"notice":{"text":"automjeti u shtua"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});





$app->put('/api/automjeti/modifiko/{Id_SMA}', function (Request $request, Response $response) {
	
	$Id_SMA = $request->getAttribute('Id_SMA');
	$Marka_Automjetit_SMA = $request->getParam('Marka_Automjetit_SMA');
	$Modeli_Automjetit_SMA = $request->getParam('Modeli_Automjetit_SMA');
	$Viti_Prodhimit_SMA = $request->getParam('Viti_Prodhimit_SMA');
	$Motorri_Automjetit_SMA = $request->getParam('Motorri_Automjetit_SMA');
	$Numri_Uleseve_SMA = $request->getParam('Numri_Uleseve_SMA');
	$Ngjyra_Automjetit_SMA = $request->getParam('Ngjyra_Automjetit_SMA');
	$Qmimi_Automjetit_SMA = $request->getParam('Qmimi_Automjetit_SMA');
    $sql = "UPDATE automjetet_sma SET
	Marka_Automjetit_SMA = :Marka_Automjetit_SMA,
	Modeli_Automjetit_SMA = :Modeli_Automjetit_SMA,
	Viti_Prodhimit_SMA = :Viti_Prodhimit_SMA,
	Motorri_Automjetit_SMA = :Motorri_Automjetit_SMA,
	Numri_Uleseve_SMA = :Numri_Uleseve_SMA,
	Ngjyra_Automjetit_SMA = :Ngjyra_Automjetit_SMA,
	Qmimi_Automjetit_SMA = :Qmimi_Automjetit_SMA
	WHERE Id_SMA = '$Id_SMA'";
	try{
		
		$db = new db();
		
		$db=$db->connect();
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':Marka_Automjetit_SMA',$Marka_Automjetit_SMA);
		$stmt->bindParam(':Modeli_Automjetit_SMA',$Modeli_Automjetit_SMA);
		$stmt->bindParam(':Viti_Prodhimit_SMA',$Viti_Prodhimit_SMA);
		$stmt->bindParam(':Motorri_Automjetit_SMA',$Motorri_Automjetit_SMA);
		$stmt->bindParam(':Numri_Uleseve_SMA',$Numri_Uleseve_SMA);
		$stmt->bindParam(':Ngjyra_Automjetit_SMA',$Ngjyra_Automjetit_SMA);
		$stmt->bindParam(':Qmimi_Automjetit_SMA',$Qmimi_Automjetit_SMA);
		$stmt->execute();
		echo'{"notice":{"text":"automjeti u modifikua"}';
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});



$app->delete('/api/automjeti/fshije/{Id_SMA}', function (Request $request, Response $response) {
	
	$Id_SMA = $request->getAttribute('Id_SMA');
	
    $sql = "DELETE FROM automjetet_sma WHERE Id_SMA = '$Id_SMA'";
	try{
		
		$db = new db();
		 
		$db=$db->connect();
		
		$stmt = $db->prepare($sql);
		$stmt->execute();
		echo'{"notice":{"text":"automjeti u fshije"}';
		
	} catch(PDOException $e){
		echo '{"error":{"text": '.$e->getMessage().'}';
	}
});




