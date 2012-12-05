<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GalerieModel
 *
 * @author jan
 */

namespace Adrenalincup;

use Nette\Image;

class Galerie extends Base {

    protected function getTable() {
        // název tabulky odvodíme z názvu třídy

        return $this->connection->table("photo");
    }

    public function savePhoto($data) {
        $this->getTable()->insert($data);
    }
    public function deletePhoto($id){
        $this->getTable()->where('id', $id)->delete();
    }

    public function getAll() {
        return $this->getTable();
    }

    public function getAllForArticle($id) {
        return $this->getTable()->where("article_id", $id);
    }

    public function uploadPhoto($newFileName, $newFilePath) {
        $from = 'upload/uploads/' . $newFileName;
        //$destination = 'images/galerie/' . $folder . '/' . $newFilePath . '.JPG';
        // $file = file('upload/uploads/'.$fileName);
        // $file->move('images/galerie/' . $folder . '/' . $photoName . '.JPG');

        if (file_exists($from)) {
            copy($from, $newFilePath);
            unlink($from);
        }

        $image = Image::fromFile($newFilePath);

        $parts = explode("/", $newFilePath);
        $small = $parts[0] . "/" . $parts[1] . "/" . $parts[2] . "/140" . $parts[2] . "_" . $parts[3];
        $big = $parts[0] . "/" . $parts[1] . "/" . $parts[2] . "/800" . $parts[2] . "_" . $parts[3];
        $press = $parts[0] . "/" . $parts[1] . "/" . $parts[2] . "/" . $parts[2] . "_" . $parts[3];

        $image->save($press);
        if ($image->getWidth() > $image->getHeight()) {
            $photoBig = $image->resize(800, NULL)->save($big);
            $photoSmall = $image->resize(140, NULL)->save($small);
        } else {
            $photoBig = $image->resize(NULL, 800)->save($big);
            $photoSmall = $image->resize(NULL, 140)->save($small);
        }
        unlink($newFilePath);
        return $newFilePath;
    }

}
