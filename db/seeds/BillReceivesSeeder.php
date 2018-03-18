<?php

use Phinx\Seed\AbstractSeed;

class BillReceivesSeeder extends AbstractSeed
{
    const NAMES = [
        'Salário',
        'Bico',
        'Restituição do Imposto de Renda',
        'Vendas de produtos usados',
        'Bolsa de valores',
        'CDI',
        'Tesouro Direto',
        'Previdência Privada'
    ];
	
	
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
    	$faker = \Faker\Factory::create('pt_BR');
    	$faker->addProvider($this);
		$billReceives = $this->table('bill_receives');
		$data=[];
		foreach(range(1,20) as $value){
			$data[] = [
				'date_lance' => $faker->dateTimeBetween('-1 month')->format('Y-m-d'),
				'name' => $faker->billReceivesName(),
				'value' => $faker->randomFloat(2,10,1000),
				'user_id' => rand(1,4),
				'created_at' => date('y-m-d H:i:s'),
				'updated_at' => date('y-m-d H:i:s')
			];
		}
		$billReceives->insert($data)->save();
    }
    
    //metodo para gerar categorias a partir da lista NAMES
    public function billReceivesName(){
		return \Faker\Provider\Base::randomElement(self::NAMES);
	}
}
