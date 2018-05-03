<?php

class Form
{
    public $path;
    public $file;

    public function __construct($p, $f)
    {
        $this->path = $p;
        $this->file = $f;
    }

    public function frmGenerate($actionURI)
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);
        $form = "<form method='post' action='$actionURI'>";

        foreach($conf as $content) {
            $form .= "<div>";

            if (isset($content['name']) && $content['type'] != "hidden") {
                $form .= "<label for='" . $content['name'] . "'>";
                $form .= ucfirst($content['name']);
                $form .= "&nbsp;: ";
                $form .= "</label>";
            }
            if (isset($error['name'])) {
                $form .= $error['name'];
            }
            $form .= "<";
            $form .= $content['tag'];
            $form .= " ";
            $form .= "type='";
            $form .= $content['type'];
            $form .= "' ";
            $form .= isset($content['name']) ? "name='" . $content['name'] . "'" : "";
            $form .= " />";
            $form .= "</div>";
        }

        $form .= "</form>";

        return $form;
    }

    public function frmCheck()
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);
        $hiddenFieldName = array_key_exists('itemHiddenField', $conf) ? $conf['itemHiddenField']['name'] : false;

        if (isset($_POST[$hiddenFieldName])) {
            $errors = array();
            foreach($conf as $content) {
                if (isset($content['name']) && $content['name'] != "hiddenField") {
                    $value = $content['name'];
                    $$value = isset($_POST[$value])  ? $_POST[$value] : "" ;
                    if ($$value == "") array_push($errors, "Merci de saisir votre $value");
                }
            }
            if (count($errors) > 0) {
                $message = "<ul>";
                foreach ($errors as $msg) {
                    $message .= "<li>";
                    $message .= $msg;
                    $message .= "</li>";
                }
                $message .= "</ul>";
                echo $message;
            }
            else {

                $sql = "INSERT INTO easywedding (ADMNAME,ADMFIRSTNAME,ADMMAIL,ADMPASSWORD)
            VALUES ($_POST('name'))";

                $query = $pdo->prepare($sql);
                $query->execute();




            }
        }
        else {
            return false;
        }
    }

    /*public function frmValidate()
    {
        $conf = parse_ini_file($this->path . $this->file . ".ini", true);

        $errors = array();
        $value = $conf['item1']['name'];
        $$value = $_POST[$value];

        $value2 = $conf['item3']['name'];
        $$value2 = $_POST[$value2];

        if (strlen($$value) < 4) {
            echo  'min 4 caractères';
        }

        if (!filter_var($$value2, FILTER_VALIDATE_EMAIL)) {
            echo 'Veuillez remplir un email valide';
        }
    }*/

}
