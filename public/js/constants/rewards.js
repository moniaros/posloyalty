
/**
 * Namespace: REWARDS
 */
var REWARDS = {};

REWARDS.conditionTypes = [
    {
        label: "First Use",
        value: "first_use"
    },
    {
        label: "Number of Products Purchased / Product Purchased",
        value: "product_purchase"
    },
    {
        label: "Purchase Amount",
        value: "purchase_amount"
    }
];

REWARDS.comparison = [
    {
        label: "Greater Than",
        value: ">"
    },
    {
        label: "Greater Than Or Equal To",
        value: ">="
    },
    {
        label: "Less Than",
        value: "<"
    },
    {
        label: "Less Than Or Equal To",
        value: "<="
    },
    {
        label: "Equal To",
        value: "="
    }
];

REWARDS.conditions = {
    first_use: [],
    product_purchase: REWARDS.comparison,
    purchase_amount: REWARDS.comparison
};

REWARDS.types = [
    {
        label: "Discount",
        value: "discount"
    },
    {
        label: "Free Product",
        value: "free_product"
    }
];