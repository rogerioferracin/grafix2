<?php

namespace Grafix\Libraries\Repositories;


use Grafix\Models\Endereco;

class EnderecoRepository
{

	/**
	 * Returns all Enderecos
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Endereco::all();
	}

	/**
	 * Stores Endereco into database
	 *
	 * @param array $input
	 *
	 * @return Endereco
	 */
	public function store($input)
	{
		return Endereco::create($input);
	}

	/**
	 * Find Endereco by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Endereco
	 */
	public function findEnderecoById($id)
	{
		return Endereco::find($id);
	}

	/**
	 * Updates Endereco into database
	 *
	 * @param Endereco $endereco
	 * @param array $input
	 *
	 * @return Endereco
	 */
	public function update($endereco, $input)
	{
		$endereco->fill($input);
		$endereco->save();

		return $endereco;
	}
}