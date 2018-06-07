<?php

/**
 * Stripe Update Charge.
 */
namespace Omnipay\Stripe\Message;

/**
 * Stripe Update Customer Request.
 *
 * Updates the specified charge by setting the values of the parameters passed.
 * Any parameters not provided will be left unchanged.
 *
 * This request accepts mostly the same arguments as the charge
 * creation call.
 *
 * @link https://stripe.com/docs/api#update_charge
 */
class UpdateCharge extends AbstractRequest
{
    public function getData()
    {
        $this->validate('transactionReference');

        $data = array();

        if ($this->getMetadata()) {
            $data['metadata'] = $this->getMetadata();
        }
        if ($this->getDescription()) {
            $data['description'] = $this->getDescription();
        }

        return $data;
    }

    public function getEndpoint()
    {
        return $this->endpoint.'/charges/'.$this->getTransactionReference();
    }
}
