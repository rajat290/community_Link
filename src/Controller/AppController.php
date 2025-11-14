public function beforeRender(\Cake\Event\EventInterface $event)
{
    parent::beforeRender($event);

    // Public routes use public layout
    $publicRoutes = [
        'publicRegister',
        'display'
    ];

    if (in_array($this->request->getParam('action'), $publicRoutes)) {
        $this->viewBuilder()->setLayout('public');
    }
}
