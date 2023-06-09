<?php

class ExtPagesProcessorNewsletter extends ComPagesControllerProcessorWebhook
{
	protected function _initialize(KObjectConfig $config)
	{
		$config->append([
			'url'   => 'https://api.sendgrid.com/v3/marketing/contacts',
			'headers' => [
				'Authorization' => 'Bearer '.getenv('SENDGRID_API_KEY'),
        'Content-Type'  => 'application/json'
			],
			'format' => 'json',
      'method' => KHttpRequest::PUT
		]);

		parent::_initialize($config);
	}

	public function getPayload(array $data)
	{
      $data = [
        'list_ids' => ['-add-here'],
        'contacts' => [[
            'email' => $data['email'],
            'first_name' => $data['firstName'],
            'last_name'  => $data['lastName'],
        ]]
      ];

		  return parent::getPayload($data);
	}
}
