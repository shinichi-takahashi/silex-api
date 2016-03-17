<?php

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Doctrine\DBAL\Connection;

$app->get('/', function () use ($app) {
    return $app->json(array());
});

$app->get('/query/raw/{id}', function($id) use ($app) {
    $sql = 'SELECT * FROM table_name WHERE id > ?';

    $row = $app['db']->fetchAssoc($sql, array($id));
    return $app->json($row);
});

$app->get('/query/builder/{id}', function($id) use ($app) {
    $builder = $app['dbs']['default']->createQueryBuilder();
    $builder
        ->select('*')
        ->from('table_name')
        ->where('seq > ?')
        ->setParameter(0, 1000);
    $all = $builder->execute()->fetchAll();

    return $app->json($all);
});

$app->error(function (\Exception $e, $code) use ($app) {
    return $app->json(array(
        'code' => $code,
        'message' => $e->getMessage(),
    ));
});
