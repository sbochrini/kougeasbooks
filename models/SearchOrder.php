<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * SearchOrder represents the model behind the search form about `app\models\Order`.
 */
class SearchOrder extends Order
{
    /**
     * @inheritdoc
     */
    public $order_book;

    public function rules()
    {
        return [
            [['order_id', 'order_bk_id', 'order_complete'], 'integer'],
            [['usr_name', 'usr_surname', 'usr_phone', 'usr_email', 'usr_address', 'usr_city', 'usr_pcode', 'order_comment', 'order_date', 'order_comment', 'order_admin_comment'], 'safe'],
            [['order_book'], 'safe'],
            //[['order_date'], 'date'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Order::find();

        // add conditions that should always apply here
        $query->joinWith('orderBk');  //->orderBy('order_date desc')
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'attributes'=>[
                    'order_date',
                    'order_book'=>[
                        'asc' => ['tbl_book.bk_title' => SORT_ASC],
                        'desc' => ['tbl_book.bk_title' => SORT_DESC],
                    ],
                    'usr_name',
                    'usr_surname'
                ],
                'defaultOrder' => ['order_date'=>SORT_DESC]
            ],
        ]);

       /* $dataProvider->sort->attributes['order_book'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['tbl_book.bk_title' => SORT_ASC],
            'desc' => ['tbl_book.bk_title' => SORT_DESC],
        ];*/

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'order_id' => $this->order_id,
            //'order_date' => $this->order_date,
            'order_complete' => $this->order_complete,
           // 'order_bk_id' => $this->order_bk_id,


        ]);

        $query->andFilterWhere(['like', 'usr_name', $this->usr_name])
            ->andFilterWhere(['like', 'tbl_book.bk_title', $this->order_book])
            ->andFilterWhere(['like', 'usr_surname', $this->usr_surname])
            ->andFilterWhere(['like', 'usr_phone', $this->usr_phone])
            ->andFilterWhere(['like', 'usr_email', $this->usr_email])
            ->andFilterWhere(['like', 'usr_address', $this->usr_address])
            ->andFilterWhere(['like', 'usr_city', $this->usr_city])
            ->andFilterWhere(['like', 'usr_pcode', $this->usr_pcode])
            ->andFilterWhere(['like', 'order_comment', $this->order_comment])
            ->andFilterWhere(['like', 'order_admin_comment', $this->order_admin_comment])
            ->andFilterWhere(['like', 'order_date', $this->order_date]);

        return $dataProvider;
    }
}
