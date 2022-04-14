import { gql } from "@apollo/client/core";

export const updateProduct = gql`
  mutation UpdateProduct(
    $code: String!
    $name: String!
    $description: String!
    $units: Int!
    $price: Float!
  ) {
    updateProduct(
      code: $code
      name: $name
      desc: $description
      units: $units
      price: $price
    ) {
      code
      name
      desc
      units
      price
    }
  }
`;
