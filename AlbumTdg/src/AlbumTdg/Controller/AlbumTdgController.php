<?php

namespace AlbumTdg\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Zend\Db\TableGateway\TableGateway;

use AlbumTdg\Form\AlbumForm;
use AlbumTdg\Form\AlbumFilter;

use AlbumTdg\Model\Table\Album;

class AlbumTdgController extends AbstractActionController
{
	private $albumTable = null;
	// R - Retrieve
	public function indexAction()
	{
		return new ViewModel(array('rowset' => $this->getAlbumTable()->select())); //rowset is just a name we create
	}
	// C - Create
	public function createAction()
	{
		$form = new AlbumForm();
		$request = $this->getRequest();
		if($request->isPost())
		{
				$form->setInputFilter(new AlbumFilter());
				$form->setData($request->getPost());

				if ($form->isValid()) {
					$data = $form->getData();
					unset($data['submit']);
					$this->getAlbumTable()->insert($data);
					return $this->redirect()->toRoute('album_tdg/default', array('controller' => 'album-tdg', 'action' => 'index'));	
				}
		}
		return new ViewModel(array('form' => $form));
	}

	// U - Update
	public function updateAction()
	{
			$id = $this->params()->fromRoute('id');
			if (!$id) return $this->redirect()->toRoute('album_tdg/default', array('controller' => 'album-tdg', 'action' => 'index'));
			$form = new AlbumForm();
			$request = $this->getRequest();
			        if ($request->isPost()) 
			        {
						$form->setInputFilter(new AlbumFilter());
						$form->setData($request->getPost());
						if ($form->isValid()) 
						{
							$data = $form->getData();
							unset($data['submit']);
							$this->getAlbumTable()->update($data, array('id' => $id));
							return $this->redirect()->toRoute('album_tdg/default', array('controller' => 'album-tdg', 'action' => 'index'));	
						}	
					}
			else 
			{
				$form->setData($this->getAlbumTable()->select(array('id' => $id))->current());	
			}
			return new ViewModel(array('form' => $form, 'id' => $id));	
	}

	// D - Delete
	public function deleteAction()
	{
		$id = $this->params()->fromRoute('id');
		if ($id) 
		{
			$this->getAlbumTable()->delete(array('id' => $id));
		}

		return $this->redirect()->toRoute('album_tdg/default', array('controller' => 'album-tdg', 'action' => 'index'));	
	}

	public function getAlbumTable()
	{
		if(!$this->albumTable)
		{
			// $this->albumTable = new TableGateway(
			// 	'album', //Table "album" in the Datebase-MySQL
			// 	$this->getServiceLocator()->get('Zend\Db\Adapter\Adapter')
			// );
			$this->albumTable = new Album($this->getServiceLocator()->get('Zend\Db\Adapter\Adapter'));

		}
		return $this->albumTable;
	}
}