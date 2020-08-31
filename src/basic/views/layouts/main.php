<?php
if(Yii::$app->params['boostrap']==3){
    echo $this->render('boostrap3',['content'=>$content]);
}else{
    echo $this->render('boostrap4',['content'=>$content]);
}

?>
