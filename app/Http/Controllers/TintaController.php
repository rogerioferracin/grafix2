<?php namespace Grafix\Http\Controllers;

use App\Http\Requests;
use Grafix\Http\Requests\CreateTintaRequest;
use Grafix\Libraries\Repositories\TintaRepository;
use Mitul\Controller\AppBaseController;
use Response;
use Flash;

class TintaController extends AppBaseController
{

	/** @var  TintaRepository */
	private $tintaRepository;

	function __construct(TintaRepository $tintaRepo)
	{
		$this->tintaRepository = $tintaRepo;
	}

	/**
	 * Display a listing of the Tinta.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tintas = $this->tintaRepository->all();

		return view('tintas.index')->with('tintas', $tintas);
	}

	/**
	 * Show the form for creating a new Tinta.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('tintas.create');
	}

	/**
	 * Store a newly created Tinta in storage.
	 *
	 * @param CreateTintaRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateTintaRequest $request)
	{
        $input = $request->all();

		$tinta = $this->tintaRepository->store($input);

		Flash::message('Tinta saved successfully.');

		return redirect(route('tintas.index'));
	}

	/**
	 * Display the specified Tinta.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$tinta = $this->tintaRepository->findTintaById($id);

		if(empty($tinta))
		{
			Flash::error('Tinta not found');
			return redirect(route('tintas.index'));
		}

		return view('tintas.show')->with('tinta', $tinta);
	}

	/**
	 * Show the form for editing the specified Tinta.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tinta = $this->tintaRepository->findTintaById($id);

		if(empty($tinta))
		{
			Flash::error('Tinta not found');
			return redirect(route('tintas.index'));
		}

		return view('tintas.edit')->with('tinta', $tinta);
	}

	/**
	 * Update the specified Tinta in storage.
	 *
	 * @param  int    $id
	 * @param CreateTintaRequest $request
	 *
	 * @return Response
	 */
	public function update($id, CreateTintaRequest $request)
	{
		$tinta = $this->tintaRepository->findTintaById($id);

		if(empty($tinta))
		{
			Flash::error('Tinta not found');
			return redirect(route('tintas.index'));
		}

		$tinta = $this->tintaRepository->update($tinta, $request->all());

		Flash::message('Tinta updated successfully.');

		return redirect(route('tintas.index'));
	}

	/**
	 * Remove the specified Tinta from storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$tinta = $this->tintaRepository->findTintaById($id);

		if(empty($tinta))
		{
			Flash::error('Tinta not found');
			return redirect(route('tintas.index'));
		}

		$tinta->delete();

		Flash::message('Tinta deleted successfully.');

		return redirect(route('tintas.index'));
	}

}
