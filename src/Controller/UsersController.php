<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Event\EventInterface;
use Cake\Http\Response;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        parent::initialize();
        $this->Authentication->allowUnauthenticated(['login']);
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to the appropriate page after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Projects',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid email or password'));
        }
    }

    /**
     * Logout action.
     *
     * Logs the user out if they are currently authenticated and redirects them to the login page.
     *
     * @return \Cake\Http\Response Redirects the user to the login page after logging out.
     */
    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }

    public function index()
    {
        // Configure pagination settings
        $this->paginate = [
            'limit' => 10, // Adjust the limit as needed
        ];

        // Get paginated user data
        $users = $this->paginate($this->Users);

        // Pass the paginated data to the view
        $this->set(compact('users'));
    }

    public function edit($user_serial = null)
    {
        // Find the user data based on the provided $user_serial
        $user = $this->Users->get($user_serial, [
            'contain' => [],
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            // Patch the user entity with the submitted data
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been updated successfully.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to update the user. Please, try again.'));
            }
        }

        $this->set(compact('user'));
    }

    public function add()
    {
        // Create a new empty user entity
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {
            // Patch the user entity with the submitted data
            $user = $this->Users->patchEntity($user, $this->request->getData());

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been added successfully.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Unable to add the user. Please, try again.'));
            }
        }

        $this->set(compact('user'));
    }

    public function delete($userSerial = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($userSerial);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('Unable to delete the project.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
