<?php

namespace Ay4t\IAK;

class Client extends AbstractRequest
{
    /**
     * Function: api_call
     * API to get remaining balance in your IAK wallet.
     * @return array
     */
    public function checkBalance()
    {
        $this->sign('bl');
        return $this->api_call('check-balance', 'post');
    }

    /**
     * Function: checkOperator
     * API to get operator name from customer id prefix. You can refer to here for operator prefix
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
     * API to get pricelist of IAK prepaid products.
     * @return array
     */
    public function pricelist()
    {
        $this->sign('pl');
        return $this->api_call('pricelist', 'post');
    }

    /**
     * Function: topUp
     * API to top up prepaid products.
     * 
     * For the first time, top up will always response processing. IAK will send callback once the transaction become > success / failed. Learn more about callback here
     * If you top up again with the same ref_id, then it we will not proceed the transaction but it will become check status. Learn more about check status here
     * 
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
     * API to check status prepaid transaction.
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
