<?php


namespace backend\models;
use common\models\UserForm;
use yii\data\ActiveDataProvider;
use yii\helpers\VarDumper;
class UserFormSearch extends UserForm
{
    public function rules()
    {
        return [
            [['id','name','surname','email','phone','text'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = UserForm::find();

        if(array_key_exists('email',$params)) {
            $query->where(['email' => $params['email']]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'email', $this->email . '%', false])
            ->andFilterWhere(['like', 'phone', $this->phone . '%', false])
            ->andFilterWhere(['like', 'text', $this->text]);

        return $dataProvider;
    }
}
