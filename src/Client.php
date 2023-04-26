<?php

namespace Ay4t\IAK;

class Client extends AbstractRequest
{
    /**
     * Function: api_call
     * @return array
     */
    public function checkBalance()
    {
        $this->sign('bl');
        return $this->api_call('check-balance', 'post');
    }

    /**
     * Function: checkOperator
     * @param string $target
     * @return array
     */
    public function checkOperator(string $target)
    {
        $this->sign('op');
        return $this->api_call('check-operator', 'post', [
            'customer_id' => $target
        ]);
    }

    /**
     * Function: pricelist
     * @return array
     */
    public function pricelist()
    {
        $this->sign('pl');
        return $this->api_call('pricelist', 'post');
    }

    /**
     * Function: topUp
     * @param string $refId
     * @param string $product_code
     * @param string $target
     */
    public function topUp(string $refId, string $product_code, string $target)
    {
        $this->sign('tu' . $refId . $product_code . $target);
        return $this->api_call('top-up', 'post', [
            'ref_id' => $refId,
            'code' => $product_code,
            'target' => $target
        ]);
    }

    /**
     * Function: checkStatus
     * @param string $refId
     * @return array
     */
    public function checkStatus(string $refId)
    {
        $this->sign('cs' . $refId);
        return $this->api_call('check-status', 'post', [
            'ref_id' => $refId
        ]);
    }
}
