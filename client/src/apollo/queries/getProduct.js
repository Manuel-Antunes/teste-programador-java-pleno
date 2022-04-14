import { gql } from "@apollo/client/core";

export const getProduct = gql`
  query GetProduct($code: String!) {
    product(code: $code) {
      name
      desc
      units
      price
    }
  }
`;
