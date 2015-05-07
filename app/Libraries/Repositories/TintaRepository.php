<?php

namespace Grafix\Libraries\Repositories;


use Grafix\Models\Tinta;

class TintaRepository
{

	/**
	 * Returns all Tintas
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function all()
	{
		return Tinta::all();
	}

	/**
	 * Stores Tinta into database
	 *
	 * @param array $input
	 *
	 * @return Tinta
	 */
	public function store($input)
	{
		return Tinta::create($input);
	}

	/**
	 * Find Tinta by given id
	 *
	 * @param int $id
	 *
	 * @return \Illuminate\Support\Collection|null|static|Tinta
	 */
	public function findTintaById($id)
	{
		return Tinta::find($id);
	}

	/**
	 * Updates Tinta into database
	 *
	 * @param Tinta $tinta
	 * @param array $input
	 *
	 * @return Tinta
	 */
	public function update($tinta, $input)
	{
		$tinta->fill($input);
		$tinta->save();

		return $tinta;
	}
}