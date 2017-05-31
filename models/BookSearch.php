<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * @inheritdoc
     */
    public $author_name;
    public $cat_name;
    public $cat_id;
    public $subcat_name;
    public $ch_bk_grouping;
    public $subcat_id;
    public $ch_bk_subcats;

    public function rules()
    {
        return [
            [['bk_id'], 'integer'],
            [['bk_title', 'bk_publisher', 'bk_pb_place', 'bk_pb_year', 'bk_pages', 'bk_condition', 'bk_grouping','bk_cat_id'], 'safe'],
            [['bk_price'], 'number'],
            [['author_name', 'cat_name','subcat_name'], 'safe'],
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
       // if(isset($params[1])){
         //   $query = Book::find()->where(['bk_cat_id'=>$this->cat_id])->with('bkAuthor', 'bkCat', 'bkSubcat');
      //  }else{
           // $query = Book::find()->where(['bk_cat_id'=>$this->cat_id])->JoinWith(['bkAuthor', 'bkCat', 'bkSubcat'],"INNER JOIN");
       // }
        //if(is_null($this->cat_id) && is_null($this->ch_bk_grouping)){
        if(is_null($this->cat_id) && is_null($this->ch_bk_subcats)){
            $query = Book::find();
            $query->joinWith(['bkAuthor', 'bkCat', 'bkSubcat'],"INNER JOIN");
       // }elseif($this->cat_id!=="" && $this->ch_bk_grouping!==""){
        /*}elseif($this->cat_id!=="" && ($this->ch_bk_subcats!=="" | is_null($this->ch_bk_subcats))){
            $query = Book::find();
            $query->joinWith(['bkAuthor', 'bkCat', 'bkSubcat'],"INNER JOIN");
           // $query = Book::find()->where(['bk_cat_id'=>$this->cat_id,'bk_subcat_id'=>$this->ch_bk_subcats]);
            //$query->joinWith(['bkAuthor', 'bkCat', 'bkSubcat'], "INNER JOIN");*/
        //}elseif($this->cat_id!=="" && $this->ch_bk_grouping==""){
        }elseif($this->cat_id!=="" && ($this->ch_bk_subcats=="" | is_null($this->ch_bk_subcats))){
            /*if(is_array($this->cat_id)){

            }else{*/
                $query = Book::find()->where(['bk_cat_id'=>$this->cat_id]);
                $query->joinWith(['bkAuthor', 'bkCat', 'bkSubcat'], "INNER JOIN");
            //
        }elseif($this->cat_id!=="" && $this->ch_bk_subcats!=="" ){
            $query = Book::find()->where(['bk_cat_id'=>$this->cat_id,'bk_subcat_id'=>$this->ch_bk_subcats]);
            $query->joinWith(['bkAuthor', 'bkCat', 'bkSubcat'], "INNER JOIN");
        }else{
            $query = Book::find();
            $query->joinWith(['bkAuthor', 'bkCat', 'bkSubcat'], "INNER JOIN");
        }


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['author_name'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['tbl_author.auth_name' => SORT_ASC],
            'desc' => ['tbl_author.auth_name' => SORT_DESC],
        ];
        // Lets do the same with country now
        $dataProvider->sort->attributes['cat_name'] = [
            'asc' => ['tbl_category.cat_name' => SORT_ASC],
            'desc' => ['tbl_category.cat_name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['subcat_name'] = [
            'asc' => ['tbl_subcategory.cat_name' => SORT_ASC],
            'desc' => ['tbl_subcategory.cat_name' => SORT_DESC],
        ];
        // No search? Then return data Provider
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
       /* $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }*/

        // grid filtering conditions
        $query->andFilterWhere([
            'bk_id' => $this->bk_id,
           // 'bkAuthor.auth_name' => $this->author_name,
           // 'tbl_category.cat_name' => $this->cat_name,
            //'bk_cat_id' => $this->bkAuthor.auth_name,
            'bk_pb_year' => $this->bk_pb_year,
            'bk_price' => $this->bk_price,
        ]);

        $query->andFilterWhere(['like', 'bk_title', $this->bk_title])
            ->andFilterWhere(['like', 'tbl_author.auth_name', $this->author_name])
         //   ->andFilterWhere(['like', 'tbl_category.cat_name', $this->cat_name])
            ->andFilterWhere(['like', 'tbl_subcategory.subcat_name', $this->subcat_name])
            ->andFilterWhere(['like', 'bk_publisher', $this->bk_publisher])
            ->andFilterWhere(['like', 'bk_pb_place', $this->bk_pb_place])
            ->andFilterWhere(['like', 'bk_pages', $this->bk_pages])
            ->andFilterWhere(['like', 'bk_condition', $this->bk_condition])
            ->andFilterWhere(['like', 'bk_grouping', $this->bk_grouping]);

        return $dataProvider;
    }
}
