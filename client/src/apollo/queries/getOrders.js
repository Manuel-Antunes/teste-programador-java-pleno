import { gql } from "@apollo/client/core"

export const getOrders = gql`
    query GetOrders{
        orders {
            number
            issue_date
            desc
            total_price
            products {
                code
                name
                desc
                units
                price
            }
        }
  }
`
