import { gql } from "@apollo/client/core"

export const attachProduct = gql`
    mutation AttachProduct($order_id: Int!, $product_ids: [String]!) {
        attachProduct(order_id: $order_id, product_ids: $product_ids) {
            code
            name
            desc
            units
            price
        }
    }
`