<?php

echo $this->Form->create($volunteer, ['type' => 'file']);
echo $this->Form->control('first_name');
...
echo $this->Form->control('document_file', ['type' => 'file', 'label' => 'Upload single PDF (CV/Docs)']);
echo $this->Form->button('Submit');
echo $this->Form->end();

